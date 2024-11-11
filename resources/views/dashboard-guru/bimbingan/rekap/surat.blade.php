<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Bimbingan</title>
   <style>
      @page {
          size: A4 landscape; /* Mengatur ukuran halaman menjadi A4 landscape */
          margin: 20mm; /* Mengatur margin */
      }

      body {
          font-family: Arial, sans-serif; /* Mengatur font */
          line-height: 1.5; /* Mengatur tinggi baris */
          margin: 0; /* Menghilangkan margin default */
      }

      h1 {
          text-align: center; /* Mengatur judul agar berada di tengah */
          margin-bottom: 20px; /* Margin bawah untuk judul */
      }

      table {
          width: 100%; /* Mengatur lebar tabel 100% */
          border-collapse: collapse; /* Menghapus spasi antara border tabel */
      }

      th, td {
         border: 1px solid black; /* Mengatur border untuk sel */
         padding: 8px; /* Menambah ruang dalam sel */
         text-align: left; /* Mengatur teks ke kiri */
         font-size: 10px
      }

      th {
          background-color: #f2f2f2; /* Mengatur warna latar belakang untuk header tabel */
      }

      /* Menambahkan sedikit styling untuk footer */
      footer {
         position: fixed;
         bottom: 10px;
         left: 20px;
         right: 20px;
         text-align: center;
         font-size: 12px;
      }
   </style>
</head>
<body>
   <h1>Laporan Kegiatan Bimbingan Siswa</h1>
   <table>
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
               <th>Pemateri</th>
               <th>Rencana Tindak Lanjut</th>
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
                  <td>{{ $item->pemateri ?? '-'}}</td>
                  <td>{{ $item->rencana_tindak_lanjut }}</td>
                  <td>{{ $item->tempat_select }}</td>
                  <td>{{ $item->tempat }}</td>
               </tr>
         @endforeach
      </tbody>
   </table>

   <footer>
      <p>Dicetak pada: {{ date('d M Y') }}</p>
   </footer>
</body>
</html>
