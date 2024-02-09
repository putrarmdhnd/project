@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl font-bold mb-2 headDash">Pengajuan Surat Online</h1>
        <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">Semua pengajuan surat yang masuk</p>
    </div>
    @can('masyarakat')
    <div class="layoutBtnPengaduan">
        <a href="{{ route('surat') }}" class="btnPengaduan text-black text-decoration-none focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center themeColor">Buat Surat</a>
    </div>

    @endcan
</div>
@can('masyarakat')
<p class="textDashboard fw-bold shadow-md bg-red-200 p-2 my-3 text-center rounded-20 text-[13px] lg:text-lg font-normal text-secondary">Jika Pengajuan Surat di Ajukan Dengan Cap Basah
    dan Status Surat Sudah Selesai Silahkan Datang ke Desa</p>

@endcan
<div class="card">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center py-2">
            <div class="col-md-12 py-2">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto">
            <table id="informasiTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="themeColor text-center align-middle">
                    <tr>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">NO</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Pembuat</th>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">No Telepon</th>
                        @endcanany
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Jenis Surat</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 ">Status</th>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th colspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Aksi</th>
                        @endcanany
                    </tr>
                    <tr>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Lihat</th>
                        @endcanany
                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Unduh</th>
                    </tr>
                </thead>
                <tbody class="text-center" @foreach ($pengajuan_saya as $item) <tr>
                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                        {{ $loop->iteration }}
                    </td>
                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                        {{ date('d F Y', strtotime($item->created_at)) }}
                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                        {{ $item->masyarakat->nama }}
                    </td>
                    @canany(['petugas', 'admin' , 'kesra','pemerintahan','pelayanan'])
                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                        {{ $item->masyarakat->telepon }}
                    </td>
                    @endcanany
                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                        {{ $item->jenis_surat }}
                    </td>

                    <td class="textTable px-2 py-4 text-secondary align-middle align-middle">

                        @if ($item->status == 'Pending')
                        <span class="textTable text-dark text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                            Pending
                        </span>
                        @endif

                        @if ($item->status == 'verifikasi')
                        <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                            sudah Terverifikasi
                        </span>
                        @endif
                        @if ($item->status == 'Diproses')
                        <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                            Sedang Diproses
                        </span>
                        @endif
                        @if ($item->status == 'Ditolak')
                        <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-danger ">
                            Ditolak
                        </span>
                        @endif
                        @if ($item->status == 'Selesai')
                        <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                            Selesai
                        </span>
                        @endif
                    
                    </td>
                    @canany(['petugas', 'admin' , 'kesra','pemerintahan','pelayanan'])
                    <td class="textTable px-2 py-4 text-secondary  align-middle ">
                        <div class="d-flex gap-3 justify-content-center align-items-center ">
                            <a href="{{ route('pengajuan-surat.show', $item->id) }}" class="text-primary">
                                <i class="bx bxs-pencil text-lg px-2"></i>
                            </a>
                        </div>
                    </td>
                    @endcanany
                    <td class="align-middle">
                        @canany(['admin', 'petugas'])
                        <a href="{{ route('pengajuan_surat.downloaded.surat', $item->id) }}" target="__blank" class="underline text-primary">
                            <i class="bx bx-import text-lg px-2"></i>
                        </a>
                        @endcanany
                        @can('masyarakat')
                        <a href="{{ route('pengajuan_surat.download.surat', $item->id) }}" target="__blank" class="underline text-primary">
                            <i class="bx bx-import text-lg px-2"></i>
                        </a>
                        @endcan
                    </td>

<<<<<<< HEAD
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#informasiTable tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    </div>
=======
                        @canany(['admin', 'petugas'])
                        <a href="{{ route('pengajuan_surat.previewew.surat', $item->id) }}" target="__blank" class="underline text-primary">Preview Surat</a>
                        <a href="{{ route('pengajuan_surat.downloaded.surat', $item->id) }}" target="__blank" class="underline text-primary">
                            <i class="bx bx-import text-lg px-2"></i>
                        </a>
                        @endcanany
                    </div>
                </td>
            </tr>
        @endforeach
            </tbody>
    </table>
>>>>>>> 89c9f3106fcfd40621861519659452d1f56dc856
</div>
@endsection