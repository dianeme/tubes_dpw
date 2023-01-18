@extends('administrator/app')
@section('content')

<form action="{{ route('pengaturan.action') }}" method="post">
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
<div class="container-fluid">
<div class="row">


<div class="col-md-12">
<div class="card">
<div class="card-body">
<div class="tab-content">
<div class="tab-pane active" id="settings">
@if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error') }}</div>
@endif
<form class="form-horizontal">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Nama</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Name" value="{{ $admin[0]->nama }}" name="nama">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" placeholder="Email" value="{{ $admin[0]->email }}" disabled>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Alamat</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Alamat" value="{{ $admin[0]->alamat }}" name="alamat">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Nomor HP</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Nomor HP" value="{{ $admin[0]->nohp }}" name="nohp">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password Sekarang</label>
<div class="col-sm-10">
<input type="password" class="form-control" placeholder="Password Sekarang" name="password_sekarang">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password Baru</label>
<div class="col-sm-10">
<input type="password" class="form-control" placeholder="Password Baru" name="password_baru">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
<div class="col-sm-10">
<input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="password_baru2">
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<button type="submit" class="btn btn-info">Submit</button>
</div>
</div>
</form>
</div>

</div>

</div>
</div>

</div>

</div>

</div>
</section>

</div>
</form>
@endsection