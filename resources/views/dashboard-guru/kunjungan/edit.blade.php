@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('kunjungan.update', $kunjungan->id) }}">
      @method('put')
      @csrf        
      <div class="form-group">
         <label for="biodata_id">Nama Siswa</label>
         <input class="form-control form-control-user" id="biodata_id" type="text" name="biodata_id" value="{{ old('biodata_id', $kunjungan->biodata->user->name) }}" readonly>
         <input type="hidden" name="biodata_id" value="{{ $kunjungan->biodata_id }}">
      </div>
      <div class="form-group">
         <label for="tanggal">Tanggal Kunjungan</label>
         <input class="form-control form-control-user" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $kunjungan->tanggal) }}" required>
      </div>
      <div class="form-group">
         <label for="permasalahan">Permasalahan</label>
         <input class="form-control form-control-user" id="permasalahan" type="text" name="permasalahan" value="{{ old('permasalahan', $kunjungan->permasalahan) }}" required>
      </div>
      <div class="form-group">
         <label for="tujuan">Tujuan Kunjungan</label>
         <input class="form-control form-control-user" id="tujuan" type="text" name="tujuan" value="{{ old('tujuan', $kunjungan->tujuan) }}" required>
      </div>
      <div class="form-group">
         <label for="pihak_terlibat">Pihak yang Terlibat</label>
         <input class="form-control form-control-user" id="pihak_terlibat" type="text" name="pihak_terlibat" value="{{ old('pihak_terlibat', $kunjungan->pihak_terlibat) }}" required>
      </div>
      <div class="form-group">
         <label for="alamat">Alamat</label>
         <input class="form-control form-control-user" id="alamat" type="text" name="alamat" value="{{ old('alamat', $kunjungan->alamat) }}" required>
      </div>
      <div class="form-group">
         <label for="ringkasan">Ringkasan</label>
         <input class="form-control form-control-user" id="ringkasan" type="text" name="ringkasan" value="{{ old('ringkasan', $kunjungan->ringkasan) }}" required>
      </div>
      <div class="form-group">
         <label for="rencana_tindak_lanjut">Rencana Tidak Lanjut</label>
         <input class="form-control form-control-user" id="rencana_tindak_lanjut" type="text" name="rencana_tindak_lanjut" value="{{ old('rencana_tindak_lanjut', $kunjungan->rencana_tindak_lanjut) }}" required>
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Simpan</button>
      </div>
   </form>
@endsection