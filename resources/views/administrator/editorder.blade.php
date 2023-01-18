@extends('administrator/app')
@section('content')
<form method="post" action="{{ route('editorder.action', $laundry->id_laundry) }}">
    @csrf
<div class="content-wrapper" style="min-height: 1604.44px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>@yield('title', $title)</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">@yield('title', $title)</li>
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
<h3 class="card-title">@yield('title', $title)</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<input type="text" name="id_pengguna" value="{{ $laundry->id_laundry }}" hidden>
<div class="form-group">
<label>Nama Pelanggan</label>
<input type="text" name="nama" value="{{ $laundry->nama }}" class="form-control">
</div>
<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" value="{{ $laundry->alamat }}" class="form-control">
</div>
<div class="form-group">
<label>Nomor HP</label>
<input type="text" name="nomorhp" value="{{ $laundry->nomorhp }}" class="form-control">
</div>
<div class="form-group">
<label for="inputProjectLeader">Jenis Laundry</label>
<select name="jenis" class="form-control custom-select">
    <option selected value="{{ $jenis_saat_ini->id_jenis }}">{{ $jenis_saat_ini->nama_jenis }}</option>
    @foreach($jenis_lainnya as $jenis)
        <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_jenis }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<label>Perkiraan Berat</label>
<input type="text" name="berat" value="{{ $laundry->berat }}" class="form-control">
</div>
<div class="form-group">
<label>Harga</label>
<input type="text" name="harga" value="{{ $laundry->harga }}" class="form-control">
</div>
<div class="form-group">
<label for="inputProjectLeader">Layanan</label>
<select name="layanan" class="form-control custom-select">
    <option selected value="{{ $layanan_saat_ini->layanan }}">{{ $layanan_saat_ini->nama_layanan }}</option>
    @foreach($layanan_lainnya as $layanan)
        <option value="{{ $layanan->layanan }}">{{ $layanan->nama_layanan }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<label for="inputProjectLeader">Pembayaran</label>
<select name="pembayaran" class="form-control custom-select">
    <option selected value="{{ $pembayaran_saat_ini->pembayaran }}">{{ $pembayaran_saat_ini->nama }}</option>
    @foreach($pembayaran_lainnya as $pembayaran)
        <option value="{{ $pembayaran->pembayaran }}">{{ $pembayaran->nama }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<label for="inputProjectLeader">Status Laundry</label>
<select name="status" class="form-control custom-select">
    <option selected value="{{ $status_saat_ini->status }}">{{ $status_saat_ini->nama }}</option>
    @foreach($status_lainnya as $status)
        <option value="{{ $status->status }}">{{ $status->nama }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<input type="submit" value="Edit Pesanan" class="btn btn-success">
</div>
</div>
</section>
</div>
</form>

@endsection