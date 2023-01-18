@extends('akun/app')
@section('content')
<form method="post" action="{{ route('order.input') }}">
    @csrf
<div class="content-wrapper" style="min-height: 1604.44px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Laundry Baru</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Laundry Baru</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Data Laundry</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<input type="text" name="id_pengguna" value="{{ Auth::user()->user_id }}" hidden>
<div class="form-group">
<label>Nama Pelanggan</label>
<input type="text" name="nama" value="{{ Auth::user()->nama }}" class="form-control">
</div>
<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" value="{{ Auth::user()->alamat }}" class="form-control">
</div>
<div class="form-group">
<label>Nomor HP</label>
<input type="text" name="nomorhp" value="{{ Auth::user()->nohp }}" class="form-control">
</div>
<div class="form-group">
<label>Jenis Laundry</label>
<select name="jenis" class="form-control custom-select">
<option selected="" disabled="">Pilih jenis laundry</option>
<option value="1">Kilat (3 Jam) - Rp 15,000,-</option>
<option value="2">Satu Hari Laundry - Rp 7000,-</option>
<option value="3">Dua Hari Laundry - Rp 5000,-</option>
</select>
</div>
<div class="form-group">
<label>Perkiraan Berat</label>
<input type="text" name="berat" value="" class="form-control">
</div>
<div class="form-group">
<label>Pilih Layanan</label>
<select name="layanan" class="form-control custom-select">
<option selected="" disabled="">Pilih salah satu</option>
<option value="1">Antar dan Jemput Sendiri (FREE)</option>
<option value="2">Pickup dan Delivery Service - Rp 3000,-</option>
</select>
</div>
<div class="form-group">
<label for="inputProjectLeader">Pembayaran</label>
<select name="pembayaran" class="form-control custom-select">
<option selected="" disabled="">Pilih salah satu</option>
<option value="1">Transfer (BCA: 1234567890)</option>
<option value="2">Cash</option>
</select>
</div>
<div class="form-group">
<input type="submit" value="Kirim Permintaan" class="btn btn-success">
</div>
</div>
</section>
</div>
</form>

@endsection