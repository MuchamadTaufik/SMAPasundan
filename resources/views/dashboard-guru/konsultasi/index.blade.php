@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Konsultasi Siswa</h6>
      </div>
      <div class="card-body">
         <a href="{{ route('konsultasi.rekapitulasi', ['jenis_kegiatans_id' => 2]) }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                     <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Induk</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Topik</th>
                        <th>Tujuan</th>
                        <th>Aksi</th>
                        <th>Rekap Konsultasi</th>
                     </tr>
                  </thead>
            
                  <tbody>
                     @foreach ($kegiatan as $data)    
                     <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $data->biodata->user->name }}</td>
                        <td>{{ $data->biodata->nomor_induk ?? '-'}}</td>
                        <td>{{ $data->biodata->kelas->name ?? '-'}}</td>
                        <td>{{ $data->biodata->semester->name ?? '-'}}</td>
                        <td>{{ $data->topik }}</td>
                        <td>{{ $data->tujuan }}</td>
                        @if ($data->tanggal)
                           <td><p class="btn btn-primary">Sudah dijadwalkan</p></td>
                        @else
                           <td><a href="{{ route('konsultasi.jadwal', $data->id) }}" class="btn btn-success" style="text-decoration: none;">Jadwalkan</a></td>
                        @endif
                        <td><a href="{{ route('konsultasi.rekap', ['biodata' => $data->biodata->id]) }}" class="btn btn-primary" style="text-decoration: none;">Rekap Konsultasi</a></td>
                     </tr>
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection