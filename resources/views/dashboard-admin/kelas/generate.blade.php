@extends('layouts.main')

@section('container')
   <form class="user" method="POST" action="{{ route('generate.kelas') }}">
      @csrf
      <div class="row">
         <div class="col-6">
            <div class="form-group">
               <select class="form-select form-control-user" name="kelas_id" required style="width: 100%">
                  <option value="" @if(old('kelas_id') === null) selected @endif>-- Pilih Kelas --</option>
                  @foreach ($kelas as $data)
                     <option value="{{ $data->id }}" @if(old('kelas_id') == $data->id) selected @endif>{{ $data->name }}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="col-6">
            <div class="form-group">
               <select class="form-select form-control-user" name="user_ids[]" multiple required style="width: 100%">
                  <option value="" disabled>-- Pilih Siswa --</option>
                  @foreach ($users as $data)
                     <option value="{{ $data->id }}" @if(is_array(old('user_ids')) && in_array($data->id, old('user_ids'))) selected @endif>{{ $data->name }}</option>
                  @endforeach
               </select>
            </div>
         </div>
      </div>
      <div>
         <button type="submit" class="btn btn-dark">Tambah</button>
      </div>
   </form>
@endsection