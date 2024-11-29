@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Jadwal Kunjungan</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                     <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                        <th>No</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Permasalahan</th>
                        <th>Tujuan</th>
                        <th>Pihak Terlibat</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
            
                  <tbody>
                     @foreach ($kunjungan as $data)    
                     <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->permasalahan }}</td>
                        <td>{{ $data->tujuan }}</td>
                        <td>{{ $data->pihak_terlibat }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                           <a href="{{ route('kunjungan.download', $data->id) }}" class="badge bg-success border-0">Download Surat</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection