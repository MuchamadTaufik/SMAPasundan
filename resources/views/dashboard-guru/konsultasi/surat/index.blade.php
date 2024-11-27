<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan Konsultasi</title>

    <style>
        @page {
            size: 5.7in 6.5in;
        }

        #judul{
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>
</head>
<body>
    <div id="halaman">
        <table width="300">
            <center>
                <font size="4">LAPORAN PELAKSANAAN LAYANAN {{ $kegiatan->jenis_kegiatans->name }}</font> <br>
                <font size="3">TAHUN PELAJARAN {{ $kegiatan->biodata->semester->name ?? '-' }}</font>
            </center>
            <hr style="width: 100%; margin-top: 20px; margin-bottom: 20px;">
        </table>

        <table width="300">
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>{{ $kegiatan->biodata->user->name}}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $kegiatan->biodata->kelas->name ?? ''}}</td>
            </tr>
            <tr>
                <td>Tanggal Konsultasi</td>
                <td>:</td>
                <td>{{ $kegiatan->tanggal}}</td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>:</td>
                <td>{{ $kegiatan->waktu }}</td>
            </tr>
            <tr>
                <td>Topik Konsultasi</td>
                <td>:</td>
                <td>{{ $kegiatan->topik }}</td>
            </tr>
            <tr>
                <td>Tujuan Konsultasi</td>
                <td>:</td>
                <td>{{ $kegiatan->tujuan }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $kegiatan->tempat_select }} ( {{ $kegiatan->tempat }} )</td>
            </tr>
        </table>
    </div>
</body>
</html>