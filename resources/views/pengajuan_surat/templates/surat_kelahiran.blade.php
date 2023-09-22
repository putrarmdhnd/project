<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Surat Keterangan Kelahiran</title>

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
            padding: 5px;
            width: 100%;
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
{{--  --}}

<body style="margin: 0px 10px;">
   
    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 20px; margin-top: -50px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png" width="90%" alt="">
    </div>

    <!-- No. Kode Desa -->

    {{-- <div style="margin-top: 26px; margin-bottom: 25px;">

        <table>
            <tr>
                <td class="fs-1">
                    Pemerintahan Kabupaten
                </td>
                <td class="fs-1">
                    : PATI
                </td>
            </tr>
            <tr>
                <td class="fs-1">
                    Kecamatan
                </td>
                <td class="fs-1">
                    : MARGOYOSO
                </td>
            </tr>
            <tr>
                <td class="fs-1">
                    Desa/Kelurahan
                </td>
                <td class="fs-1">
                    : SEMERAK
                </td>
            </tr>
        </table>

    </div> --}}

    <!-- Title -->
    <div align="center" style="margin-top: 20px;">
       <div  class="fw-bold fs-1 text-uppercase">
            <span style="border: 1px solid black; padding: 5px" > Surat Keterangan Kelahiran</span>
        </div>
        <p class="fs-1">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-bottom: 10px; text-align: center;">Yang bertanda tangan dibawah ini
            menerangkan
            dengan sebenarnya, bahwa :</div>
        <table width="100%">
            <tr>
                <td width="37%" class="fs-1">Hari</td>
                <td class="fs-1"> : {{ $surat->hari }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tanggal</td>
                <td class="fs-1"> : {{ date('d-m-Y', strtotime($surat->tanggal)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tempat Kelahiran</td>
                <td class="fs-1"> : {{ $surat->tempat_lahir }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Telah lahir anak ke</td>
                <td class="fs-1"> : {{ $surat->anak_ke }}, {{ $surat->kelamin }} bernama</td>
            </tr>

        </table>

        <div class="fs-1 uppercase" style="margin-top: 10px; margin-bottom: 20px; text-align: center;"> <span
                style="border-bottom: 2px solid #000000; text-transform: uppercase">{{ $surat->nama_anak }}</span></div>
        <table width="100%">
            <tr>
                <td width="37%" colspan="2" class="fs-1">Dari Seorang Ibu :</td>

            </tr>
            <tr>
                <td width="37%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ $surat->nama_ibu }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_ibu }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tempat, Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_ibu }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan_ibu }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat_ibu }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1"><br> Istri Dari :</td>

            </tr>
            <tr>
                <td width="37%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ $surat->nama_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tempat, Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat_ayah }}</td>
            </tr>
            <tr>
                <td colspan="2" width="37%" class="fs-1"><br> Surat keterangan ini dibuat berdasarkan keterangan
                    pelapor</td>

            </tr>
            <tr>
                <td width="37%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ $surat->nama_pelapor }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_pelapor }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tempat, Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_pelapor }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan_pelapor }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat_pelapor }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Hubungan Pelapor dengan Bayi</td>
                <td class="fs-1"> : {{ $surat->hub_pelapor_anak }}</td>
            </tr>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="fs-1" style="text-align: center;">Demikian surat keterangan dibuat untuk dapat
            digunakan seperlunya.</div>
    </div>

    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top: 20px;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -2em !important" src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/ttd.png" width="230" alt="">
            
            <p style="margin-top: -30px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
