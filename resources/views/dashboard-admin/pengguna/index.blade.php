@extends('layouts.main')

@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-dark">Daftar Pengguna</h6>
      </div>
      <div class="card-body">
         <a href="{{ route('akun.pengguna.create') }}" class="btn btn-dark float-right mb-4">Tambah Pengguna</a>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
               <thead>
                  <tr class="bg-gradient-dark sidebar sidebar-dark accordion text-white" id="accordionSidebar">
                     <th>No</th>
                     <th>Nama</th>
                     <th>Role</th>
                     <th>Email</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($pengguna as $data)    
                  <tr>
                     <td>{{ $loop->iteration }}.</td>
                     <td>{{ $data->name }}</td>
                     <td>{{ $data->role }}</td>
                     <td>{{ $data->email }}</td>
                     <td>
                        <a href="{{ route('akun.pengguna.edit', $data->id) }}" class="badge bg-warning border-0"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('akun.pengguna.delete', $data->id) }}" method="post" class="d-inline">
                           @method('delete')
                           @csrf
                           <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection