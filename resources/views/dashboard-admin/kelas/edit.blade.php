@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('kelas.update', $kelas->id) }}">
      @method('put')
      @csrf
      <div class="form-group">
         <input class="form-control form-control-user" id="name" type="text" name="name" value="{{ old('name' ,$kelas->name) }}" required>
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Ubah</button>
      </div>
   </form>
@endsection