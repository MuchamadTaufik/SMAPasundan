@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('konsultasi.update', $kegiatan->id) }}">
      @method('put')
      @csrf
      <div class="form-group">
         <label>Nama Siswa</label>
         <input class="form-control form-control-user" value="{{ old('biodata_id', $kegiatan->biodata->user->name) }}" readonly>
      </div>       
      <div class="form-group">
         <label for="tanggal">Tanggal Bimbingan</label>
         <input class="form-control form-control-user" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}" required>
      </div>
      <div class="form-group">
         <label for="waktu">Waktu Bimbingan</label>
         <input class="form-control form-control-user" id="waktu" type="time" name="waktu" value="{{ old('waktu', $kegiatan->waktu) }}" required>
      </div>
      <div class="form-group">
         <label for="tempat_select">Pilih Tempat</label>
         <select class="form-control" id="tempat_select" name="tempat_select" required>
            <option value="">Pilih</option>
            <option value="onsite" {{ old('tempat_select', $kegiatan->tempat_select) == 'onsite' ? 'selected' : '' }}>Onsite</option>
            <option value="online" {{ old('tempat_select', $kegiatan->tempat_select) == 'online' ? 'selected' : '' }}>Online</option>
         </select>
      </div>
      <div class="form-group">
         <label for="tempat">Tempat</label>
         <input class="form-control form-control-user" id="tempat" type="text" name="tempat" value="{{ old('tempat', $kegiatan->tempat) }}" required>
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Simpan</button>
      </div>
   </form>
@endsection