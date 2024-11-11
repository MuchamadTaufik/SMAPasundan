@extends('layouts.main')

@section('container')
<div class="container">
    <form class="user" method="POST" action="{{ route('guru.update', $biodata->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name', $biodata->user->name) }}" readonly>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input class="form-control form-control-user" id="semester" type="text" name="semester" value="{{ old('semester', $biodata->semester->name ?? '') }}" readonly>
        </div>
        <div class="form-group">
            <label for="semester">Kelas</label>
            <input class="form-control form-control-user" id="kelas" type="text" name="kelas" value="{{ old('kelas', $biodata->kelas->name ?? '') }}" readonly>
      </div>
        <div class="form-group">
            <label for="nomor_induk">Nomor Induk</label>
            <input class="form-control form-control-user" id="nomor_induk" type="number" name="nomor_induk" value="{{ old('nomor_induk', $biodata->nomor_induk) }}" placeholder="Masukkan Nomor Induk">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control form-control-user" id="alamat" type="text" name="alamat" value="{{ old('alamat', $biodata->alamat) }}" placeholder="Masukkan Alamat">
        </div>
        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input class="form-control form-control-user" id="nomor_hp" type="number" name="nomor_hp" value="{{ old('nomor_hp', $biodata->nomor_hp) }}" placeholder="Masukkan Nomor HP">
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Ubah</button>
        </div>
    </form>
</div>
@endsection
