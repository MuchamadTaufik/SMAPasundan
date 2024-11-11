@extends('layouts.main')

@section('container')
      <div class="container">
            <form class="user" method="POST" action="{{ route('guru.update', $user->id) }}">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" readonly>
                  </div>
                  <div class="form-group">
                        <label for="nomor_induk">Nomor Induk</label>
                        <input class="form-control form-control-user" id="nomor_induk" type="number" name="nomor_induk" value="{{ old('nomor_induk', $biodata->nomor_induk) }}" placeholder="Masukkan Nomor Induk" required>
                  </div>
                  <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control form-control-user" id="alamat" type="text" name="alamat" value="{{ old('alamat'), $biodata->alamat }}" placeholder="Masukkan Alamat" required>
                  </div>
                  <div class="form-group">
                        <label for="nomor_hp">Nomor HP</label>
                        <input class="form-control form-control-user" id="nomor_hp" type="number" name="nomor_hp" value="{{ old('nomor_hp', $biodata->nomor_hp) }}" placeholder="Masukkan Nomor HP" required>
                  </div>
                  <div>
                        <button type="submit" class="btn btn-dark">Ubah</button>
                  </div>
            </form>
      </div>
@endsection
