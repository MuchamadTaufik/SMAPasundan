@extends('layouts.main')

@section('container')

   <!-- Page Heading -->
   <div class="mb-4">
      <h1 class="h3 mb-0" style="font-weight: 600; color : black;">SMA PASUNDAN BANJARAN</h1>
      <span class="p-0 m-0" style="font-size: 1rem; color:black;">Bimbingan dan Konseling Online</span>
   </div>

   @can('isAdmin')
      <div class="row">
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Total Akun Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSiswa }} Siswa</div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Total Akun Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGuru }} Guru</div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Total Akun Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalAdmin }} Admin</div>
                     </div>
                     <div class="col-auto">
                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endcan
   
   @can('isGuru')
      <div class="row">
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Total Bimbingan Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBimbingan }} Bimbingan Siswa</div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Total Konsultasi Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKonsultasi }} Konsultasi Siswa</div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Total Kunjungan Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKunjungan }} Kunjungan Siswa</div>
                     </div>
                     <div class="col-auto">
                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total Pengguna</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body pt-4 pb-2">
                     {!! $penggunaChart->container() !!}
                  </div>
               </div>
            </div>
      
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kegiatan Siswa</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body pt-4 pb-2">
                     {!! $kegiatanChart->container() !!}
                  </div>
               </div>
            </div>
            
      </div>
   @endcan

   <script src="{{ $penggunaChart->cdn() }}"></script>
   
   {{ $penggunaChart->script() }}

   {{ $kegiatanChart->script() }}
   <script src="{{ $kegiatanChart->cdn() }}"></script>

   

@endsection