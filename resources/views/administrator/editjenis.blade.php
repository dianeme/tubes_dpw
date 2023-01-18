@extends('administrator/app')
@section('content')
<form method="post" action="{{ route('editjenis.action', $jenis->id_jenis) }}">
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
<input type="text" name="id_layanan" value="{{ $jenis->id_jenis }}" hidden>
<div class="form-group">
<label>Kode Layanan</label>
<input type="text" name="jenis" value="{{ $jenis->jenis }}" class="form-control">
</div>
<div class="form-group">
<label>Nama Jenis</label>
<input type="text" name="nama_jenis" value="{{ $jenis->nama_jenis }}" class="form-control">
</div>
<div class="form-group">
<label>Harga</label>
<input type="text" name="harga" value="{{ $jenis->harga }}" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="@yield('title', $title)" class="btn btn-success">
</div>
</div>
</section>
</div>
</form>

@endsection