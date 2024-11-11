@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('bimbingan.update', $kegiatan->id) }}">
      @method('put')    
      @csrf
      <div class="form-group">
         <input type="hidden" name="jenis_kegiatans_id" value="{{ $kegiatan->jenis_kegiatans_id }}">
      </div>        
      <div class="form-group">
         <label for="biodata_id">Nama Siswa</label>
         <input class="form-control form-control-user" id="biodata_id" type="text" name="biodata_id" value="{{ old('biodata_id', $kegiatan->biodata->user->name) }}" readonly>
         <input type="hidden" name="biodata_id" value="{{ $kegiatan->biodata_id }}">
      </div>
      <div class="form-group">
         <label for="kelas">Kelas</label>
         <input class="form-control form-control-user" id="kelas" type="text" name="kelas" value="{{ old('kelas', $kegiatan->biodata->kelas->name ?? '-') }}" readonly>
      </div>
      <div class="form-group">
         <label for="semester">Semester</label>
         <input class="form-control form-control-user" id="semester" type="text" name="semester" value="{{ old('semester', $kegiatan->biodata->semester->name ?? '-') }}" readonly>
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
         <label for="topik">Topik Bimbingan</label>
         <input class="form-control form-control-user" id="topik" type="text" name="topik" value="{{ old('topik', $kegiatan->topik) }}" required>
      </div>
      <div class="form-group">
         <label for="tujuan">Tujuan Bimbingan</label>
         <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan', $kegiatan->tujuan) }}" required>
      </div>
      <div class="form-group">
         <label for="pemateri">Pemateri</label>
         <input class="form-control form-control-user" id="pemateri" type="text" name="pemateri" value="{{ old('pemateri', $kegiatan->pemateri) }}" required>
      </div>
      <div class="form-group">
         <label for="rencana_tindak_lanjut">Rencana Tidak Lanjut</label>
         <input class="form-control form-control-user" id="rencana_tindak_lanjut" type="text" name="rencana_tindak_lanjut" value="{{ old('rencana_tindak_lanjut', $kegiatan->rencana_tindak_lanjut) }}" required>
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
         <button type="submit" class="btn btn-dark">Edit</button>
      </div>
   </form>
@endsection