@extends('layouts.main')

@section('container')
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Kunjungan Siswa</h6>
      </div>
      <div class="card-body">
         <a href="{{ route('kunjungan.rekapitulasi') }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                     <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Induk</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                        <th>Rekap Kunjungan</th>
                     </tr>
                  </thead>
            
                  <tbody>
                     @foreach ($biodata as $data)    
                     <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->nomor_induk ?? '-'}}</td>
                        <td>{{ $data->kelas->name ?? '-'}}</td>
                        <td>{{ $data->semester->name ?? '-'}}</td>
                        <td><a href="{{ route('kunjungan.create', $data->id) }}" class="btn btn-success" style="text-decoration: none;">Pilih Untuk Kunjungan</a></td>
                        <td><a href="{{ route('kunjungan.rekap', $data->id) }}" class="btn btn-primary" style="text-decoration: none;">Rekap Kunjungan</a></td>
                     </tr>
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection