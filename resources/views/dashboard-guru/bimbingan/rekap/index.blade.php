@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Daftar Bimbingan {{ $biodata->user->name }}</h6>
      </div>
      <div class="card-body">
         <a href="{{ route('bimbingan.laporan', ['biodata_id' => $biodata->id, 'jenis_kegiatans_id' => 1]) }}" class="btn btn-primary float-right mb-4">Download Laporan</a>
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
                     @php
                        $counter = 1;
                     @endphp
                     @foreach ($kegiatan as $data)
                        @if ($data->jenis_kegiatans_id === 1)
                              <tr>
                                 <td>{{ $counter }}.</td>
                                 <td>{{ $data->tanggal }}, Pukul : {{ $data->waktu }}</td>
                                 <td>{{ $data->topik }}</td>
                                 <td>{{ $data->tujuan }}</td>
                                 <td>{{ $data->pemateri }}</td>
                                 @if ($data->tempat_select == 'online')
                                    <td>{{ $data->tempat_select }} <a href="{{ $data->tempat }}">({{ $data->tempat }})</a></td>
                                 @else
                                    <td>{{ $data->tempat_select }} ({{ $data->tempat }})</td>
                                 @endif
                                 
                                 <td>
                                    <a href="{{ route('bimbingan.download', $data->id) }}" class="badge bg-success border-0">Download Surat</a>
                                    <a href="{{ route('bimbingan.edit', $data->id) }}" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('bimbingan.delete', $data->id) }}" method="post" class="d-inline">
                                          @method('delete')
                                          @csrf
                                          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                 </td>
                              </tr>
                              @php
                                 $counter++;
                              @endphp
                        @endif
                     @endforeach
                  </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection