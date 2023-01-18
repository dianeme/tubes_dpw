@extends('administrator/app')
@section('content')
<form method="post" action="{{ route('editpembayaran.action', $pembayaran->id_pembayaran) }}">
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
<input type="text" name="id_pembayaran" value="{{ $pembayaran->id_pembayaran }}" hidden>
<div class="form-group">
<label>Kode Pembayaran</label>
<input type="text" name="pembayaran" value="{{ $pembayaran->pembayaran }}" class="form-control">
</div>
<div class="form-group">
<label>Nama Pembayaran</label>
<input type="text" name="nama_pembayaran" value="{{ $pembayaran->nama }}" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="@yield('title', $title)" class="btn btn-success">
</div>
</div>
</section>
</div>
</form>

@endsection