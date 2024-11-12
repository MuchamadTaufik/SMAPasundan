@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('pengajuan.store') }}">
      @csrf
      <div class="form-group">
         <input type="hidden" name="jenis_kegiatans_id" value="{{ $jenisKegiatan->id }}">
      </div>          
      <div class="form-group">
         <label for="biodata_id">Nama Siswa</label>
         <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata->id }}">
         <input class="form-control form-control-user" id="biodata_id" type="text" value="{{ auth()->user()->name }}" readonly>
      </div>
      <div class="form-group">
         <label for="topik">Topik</label>
         <input class="form-control form-control-user" id="topik" type="text" name="topik" value="{{ old('topik') }}" required placeholder="Masukan Topik Masalah...">
      </div>
      <div class="form-group">
         <label for="tujuan">Tujuan Konsultasi</label>
         <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan') }}" required placeholder="Masukan Tujuan Konsultasi...">
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Ajukan</button>
      </div>
   </form>
@endsection
