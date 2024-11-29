@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Jadwal Bimbingan</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                     <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                        <th>No</th>
                        <th>Tanggal Bimbingan</th>
                        <th>Topik</th>
                        <th>Tujuan</th>
                        <th>Pemateri</th>
                        <th>Tempat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
            
                  <tbody>
                     @foreach ($kegiatan as $data)    
                     <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $data->tanggal }}, Pukul : {{ $data->waktu }}</td>
                        <td>{{ $data->topik}}</td>
                        <td>{{ $data->tujuan}}</td>
                        <td>{{ $data->pemateri }}</td>
                        @if ($data->tempat_select == 'online')
                           <td>{{ $data->tempat_select }} <a href="{{ $data->tempat }}">({{ $data->tempat}})</a></td>
                        @else
                           <td>{{ $data->tempat_select}} ({{ $data->tempat}})</td>
                        @endif
                        <td>
                           <a href="{{ route('bimbingan.download', $data->id) }}" class="badge bg-success border-0">Download Surat</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection