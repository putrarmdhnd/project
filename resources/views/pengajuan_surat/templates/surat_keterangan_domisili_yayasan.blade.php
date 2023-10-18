<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>

    <style>
        .fs-1 {
            font-size: 16px;
        }

        .fs-2 {
            font-size: 20px;
        }

        .fs-3 {
            font-size: 14px;
        }

        .table,
        .td,
        .th {
            border: 1px solid #595959;
            border-collapse: collapse;
        }

        .td,
        .th {
            padding: 3px;
            width: 100px;
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-uppercase {
            text-transform: uppercase;
        }
    </style>
</head>


<body style="margin: 0px 10px;">


    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 20px; margin-top: -60px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png"
            width="100%" alt="">
    </div>

    <!-- No. Kode Desa -->

    <div style="margin-top: 1em;">
        <p class="fs-1">No. Kode Desa</p>
        <p class="fs-1" style="margin-top: -15px !important;">{{ $surat->kode_desa }}</p>
    </div>

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
        {{-- <table class="table" style="margin-right: -50% !important;">
            <tbody>
                <tr>
                    <td rowspan="2" class="td fw-bold fs-1 text-uppercase">Surat</td>
                    <td colspan="2" class="td fw-bold fs-1 text-uppercase" style="width: 150px;">Keterangan</td>
                </tr>
                <tr>
                    <td colspan="2" class="td fw-bold fs-1 text-uppercase">Pengantar</td>
                </tr>
            </tbody>
        </table> --}}

         <div  class="fw-bold fs-1 text-uppercase">
            <span style="border: 1px solid black; padding: 10px" > Surat Keterangan Domisili Yayasan</span>
        </div>
        <p class="fs-1">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan dibawah ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama Pimpinan</td>
                <td class="fs-1"> : {{ $surat->nama_pimpinan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ $surat->JK }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Kewarganegaraan</td>
                <td class="fs-1"> : {{ $surat->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Yayasan</td>
                <td class="fs-1"> : {{ $surat->nama_yayasan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis/Klasifikasi Yayasan</td>
                <td class="fs-1"> : {{ $surat->jenis_yayasan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat Yayasan</td>
                <td class="fs-1"> : {{ $surat->alamat_yayasan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Akta Pendirian</td>
                <td class="fs-1"> : {{ $surat->akta_pendirian }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">SK Kemenkumham</td>
                <td class="fs-1"> : {{ $surat->sk_kemenkumham }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jumlah Pengurus</td>
                <td class="fs-1"> : {{ $surat->jumlah_pengurus }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Penanggung Jawab Yayasan</td>
                <td class="fs-1"> : {{ $surat->penanggung_jawab_yayasan }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Demikian untuk dapat dipergunakan sebagaimana mestinya.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -2em !important"
                src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/ttd.png"
                width="230" alt="">

            <p style="margin-top: -30px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
