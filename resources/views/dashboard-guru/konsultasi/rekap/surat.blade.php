<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Konsultasi Siswa</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-light: #f4f6f8;
            --text-color: #2c3e50;
            --border-color: #e0e4e8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            size: A4 landscape;
            margin: 15mm;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-light);
            padding: 20px;
        }

        .report-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 100%;
        }

        .report-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: rgb(0, 0, 0);
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .report-header h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .report-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: white;
            border-radius: 2px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table thead {
            background-color: var(--primary-color);
            color: white;
        }

        .data-table th, 
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
            font-size: 12px;
        }

        .data-table th {
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }

        .report-footer {
            background-color: var(--background-light);
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: var(--text-color);
            border-top: 1px solid var(--border-color);
        }

        @media print {
            body {
                padding: 0;
            }
            .report-container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-header">
            <h1>Laporan Kegiatan Konsultasi Siswa</h1>
        </div>

        <table class="data-table">
         <thead>
            <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Semester</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Topik</th>
                  <th>Tujuan</th>
                  <th>Tempat Select</th>
                  <th>Tempat</th>
            </tr>
         </thead>
         <tbody>
            @foreach($kegiatan as $item)
                  <tr>
                     <td>{{ $loop->iteration}}</td>
                     <td>{{ $item->biodata->user->name ?? '-'}}</td>
                     <td>{{ $item->biodata->kelas->name ?? '-'}}</td>
                     <td>{{ $item->biodata->semester->name ?? '-' }}</td>
                     <td>{{ $item->tanggal }}</td>
                     <td>{{ $item->waktu }}</td>
                     <td>{{ $item->topik }}</td>
                     <td>{{ $item->tujuan }}</td>
                     <td>{{ $item->tempat_select }}</td>
                     <td>{{ $item->tempat }}</td>
                  </tr>
            @endforeach
         </tbody>
      </table>

        <div class="report-footer">
            <p>Dicetak pada: {{ date('d M Y') }} | Laporan Resmi Rekapan Konsultasi</p>
        </div>
    </div>
</body>
</html>