<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surat Keterangan Kematian</title>

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


<body style="margin: 0px 10px;">

    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 20px; margin-top: -60px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png" width="100%" alt="">
    </div>

    <!-- No. Kode Desa -->

    <div style="margin-top: 0px;">
        <p class="fs-1">No. Kode Desa</p>
        <p class="fs-1" style="margin-top: -15px !important;">{{ $surat->kode_desa }}</p>
    </div>

    <!-- Title -->
    <div align="center">
        <div  class="fw-bold fs-1 text-uppercase">
            <span style="border: 1px solid black; padding: 5px" > Surat Keterangan Kematian</span>
        </div>
       
        <p class="fs-1">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-bottom: 10px; text-align: center;">Yang bertanda tangan dibawah ini
            menerangkan dengan sebenarnya, bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ $surat->nama }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ $surat->kelamin }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ $surat->agama }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1">: {{ $surat->alamat }}
            </tr>
            <!-- <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1">: <table width="100%">
                        <tr>
                            <td width="10%">Desa</td>
                            <td>: Lorem, ipsum.</td>
                        </tr>
                        <tr>
                            <td>  Kecamatan</td>
                            <td>: Lorem, ipsum.</td>
                        </tr>
                        <tr>
                            <td>  Kabupaten</td>
                            <td>: Lorem, ipsum.</td>
                        </tr>
                    </table>
                </td>
            </tr> -->
            <tr>
                <td width="35%" class="fs-1"><br> Telah meninggal dunia pada :</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Hari</td>
                <td class="fs-1"> : {{ \Carbon\Carbon::parse($surat->tgl_meninggal)->isoFormat('dddd') }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tanggal</td>
                <td class="fs-1"> : {{ \Carbon\Carbon::parse($surat->tgl_meninggal)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Bertempat di</td>
                <td class="fs-1"> : {{ $surat->tempat_meninggal }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Penyebab Kematian</td>
                <td class="fs-1"> : {{ $surat->penyebab_meninggal }}</td>
            </tr>
            <tr>
                <td colspan="2" width="35%" class="fs-1"> <br> Surat Keterangan ini dibuat berdasarkan
                    keterangan :</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ $surat->nama_pelapor }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_pelapor }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_pelapor }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan_pelapor }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1">: {{ $surat->alamat_pelapor }}
            </tr>
            <tr>
                <td width="35%" class="fs-1">Hubungan pelapor dengan almarhum/almarhumah</td>
                <td class="fs-1" style="text-transform: uppercase"> : {{ $surat->hub_pelapor_almarhum }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px; text-align: center;">Demikian surat keterangan dibuat untuk dapat
            digunakan seperlunya.</div>
    </div>

    <!-- Tanda Tangan -->
    <div style="width: 100%;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -4.5em !important" src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/ttd.png" width="230" alt="">
            
            <p style="margin-top: -30px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
