<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Keterangan Catatan Kepolisian</title>

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
    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;" > Surat Pengantar Keterangan Catatan Kepolisian</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-top: 10px;">Melaksanakan ketentuan Undang-undang nomor 08 tahun 1981, maka berdasarkan Surat 
            Pengantar dari Ketua RT/RW Setempat, Pemerintah Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, dengan ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"style="font-weight: bold;"> : {{ $surat->nama }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ $surat->jk }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ $surat->agama }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Warga Negara</td>
                <td class="fs-1"> : {{ $surat->warganegara }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status Perkawinan</td>
                <td class="fs-1"> : {{ $surat->status_perkawinan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pendidikan Trakhir</td>
                <td class="fs-1"> : {{ $surat->pendidikan_trakhir }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">nama tersebut di atas adalah benar warga masyarakat yang menetap dan berdomisili di 
        kampung dan desa sebagaimana tersebut di atas. Berdasarkan catatan serta data-data yang ada pada kami, nama tersebut :</div>
        <div class="fs-1"style="margin-top: 20px; margin-left:15px;">1. Berkelakuan baik di dalam kehidupan bermarsyarakat</div>
        <div class="fs-1" style="margin-left:15px;">2. Tidak/belum pernah terlibat tindak pidana</div>
        <div class="fs-1" style="margin-left:15px;">3. Tidak/belum pernah terlibat penyalahgunaan obat-obatan terlarang</div>
        <div class="fs-1" style="margin-left:15px;">4. Tidak dalam status tahanan yang berwajib</div>
        <div class="fs-1" style=" margin-top: 20px;">Surat Keterangan ini kami berikan kepada yang bersangkutan untuk dipergunakan sebagai pengantar guna mendapatkan Surat Keterangan Catatan Kepolisian dari Kantor Kecamatan Cipanas / 
            Kepolisian Sektor Pacet serta untuk dipergunakan sebagai Persyaratan :</div>
            <div class="fs-1" style="margin-top: 20px; font-weight: bold; text-align:center; text-transform: uppercase;">== {{ $surat->keperluan }} ===</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%;margin-top:-40px">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -1em !important"
                src="https://raw.githubusercontent.com/Ibnumaggie27/project/main/public/img/barttd.png"
                width="120" alt="">

            <p style="margin-top: -2px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
