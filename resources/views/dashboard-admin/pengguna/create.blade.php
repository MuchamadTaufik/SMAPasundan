@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('akun.pengguna.store') }}">
      @csrf
      <div class="form-group">
         <input class="form-control form-control-user @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="Masukan Nama">
         @error('name')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror
      </div>
      <div class="form-group">
         <select class="form-select form-control-user" name="role" required style="width: 100%">
            <option value="" @if(old('role') === null) selected @endif>-- Pilih Role --</option>
            <option value="guru" @if(old('role') == 'guru') selected @endif>Guru</option>
            <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
            <option value="siswa" @if(old('role') == 'siswa') selected @endif>Siswa</option>
         </select>
      </div>        
      <div class="form-group">
         <input class="form-control form-control-user @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Masukan Alamat Email...">
         @error('email')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror
      </div>
      <div class="form-group">
         <input class="form-control form-control-user @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Masukan Password..." required>
         @error('password')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Daftar</button>
      </div>
   </form>
@endsection