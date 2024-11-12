@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Jadwal Konsultasi</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                     <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                        <th>No</th>
                        <th>Topik Masalah</th>
                        <th>Tujuan Konsultasi</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Surat Konsultasi</th>
                     </tr>
                  </thead>
            
                  <tbody>
                     @foreach ($kegiatan as $data)    
                     <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $data->topik }}</td>
                        <td>{{ $data->tujuan}}</td>
                        <td>{{ $data->tanggal ?? 'Belum di Jadwalkan'}}</td>
                        @if ($data->tanggal)
                           <td>
                              <a href="" class="badge bg-success border-0">Download Surat</a>
                           </td>
                        @else
                           <td>Belum di Jadwalkan</td>
                        @endif
                        
                     </tr>
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection