@extends('administrator/app')
@section('content')
<form method="post" action="{{ route('edituser.action', $user->user_id) }}">
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
<input type="text" name="id_pengguna" value="{{ $user->id_laundry }}" hidden>
<div class="form-group">
<label>Nama Pelanggan</label>
<input type="text" name="nama" value="{{ $user->nama }}" class="form-control">
</div>
<div class="form-group">
<label>Email Pelanggan</label>
<input type="text" name="email" value="{{ $user->email }}" class="form-control">
</div>
<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" value="{{ $user->alamat }}" class="form-control">
</div>
<div class="form-group">
<label>Nomor HP</label>
<input type="text" name="nomorhp" value="{{ $user->nohp }}" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="@yield('title', $title)" class="btn btn-success">
</div>
</div>
</section>
</div>
</form>

@endsection