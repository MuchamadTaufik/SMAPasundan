@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('bimbingan.store') }}">
      @csrf
      <div class="form-group">
         <input type="hidden" name="jenis_kegiatans_id" value="{{ $jenisKegiatan->id }}">
      </div>        
      <div class="form-group">
         <label for="biodata_id">Nama Siswa</label>
         <input class="form-control form-control-user" id="biodata_id" type="text" name="biodata_id" value="{{ old('biodata_id', $biodata->user->name) }}" readonly>
         <input type="hidden" name="biodata_id" value="{{ $biodata->id }}">
      </div>
      <div class="form-group">
         <label for="tanggal">Tanggal Bimbingan</label>
         <input class="form-control form-control-user" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}" required>
      </div>
      <div class="form-group">
         <label for="waktu">Waktu Bimbingan</label>
         <input class="form-control form-control-user" id="waktu" type="time" name="waktu" value="{{ old('waktu') }}" required>
      </div>
      <div class="form-group">
         <label for="topik">Topik Bimbingan</label>
         <input class="form-control form-control-user" id="topik" type="text" name="topik" value="{{ old('topik') }}" required>
      </div>
      <div class="form-group">
         <label for="tujuan">Tujuan Bimbingan</label>
         <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan') }}" required>
      </div>
      <div class="form-group">
         <label for="pemateri">Pemateri</label>
         <input class="form-control form-control-user" id="pemateri" type="text" name="pemateri" value="{{ old('pemateri') }}" required>
      </div>
      <div class="form-group">
         <label for="rencana_tindak_lanjut">Rencana Tidak Lanjut</label>
         <input class="form-control form-control-user" id="rencana_tindak_lanjut" type="text" name="rencana_tindak_lanjut" value="{{ old('rencana_tindak_lanjut') }}" required>
      </div>
      <div class="form-group">
         <label for="tempat_select">Pilih Tempat</label>
         <select class="form-control" id="tempat_select" name="tempat_select" required>
            <option value="">Pilih</option>
            <option value="onsite">Onsite</option>
            <option value="online">Online</option>
         </select>
      </div>
      <div class="form-group">
         <label for="tempat">Tempat</label>
         <input class="form-control form-control-user" id="tempat" type="text" name="tempat" value="{{ old('tempat') }}" required>
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Tambah</button>
      </div>
   </form>
@endsection