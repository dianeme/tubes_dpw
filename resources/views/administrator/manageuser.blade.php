@extends('administrator/app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Semua Pengguna</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Manajemen Pengguna</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
@if(session()->has('success'))
    <p class="alert alert-success">{{ session()->get('success') }}</p>
@endif

@if(session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Semua Pengguna</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
				<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
				<i class="fas fa-times"></i>
				</button>
			</div>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped projects">
				<thead>
					<tr>
						<th style="width: 1%">
							#
						</th>
						<th style="width: 20%">
							Nama Pelanggan
						</th>
						<th style="width: 30%">
							Email
						</th>
						<th>
							Alamat
						</th>
						<th>
							No HP
						</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no = 1 ?>
                    @foreach($users as $user)
					<tr>
						<td>
							{{ $no++ }}
						</td>
						<td>
							{{ $user->nama }}
						</td>
						<td>
							{{ $user->email }}
						</td>
						<td>
							{{ $user->alamat }}
						</td>
						<td>
							{{ $user->nohp }}
						</td>
						<td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('edituser', $user->user_id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                            </a>
							<a class="btn btn-danger btn-sm" href="#">
							<i class="fas fa-trash">
							</i>
							Delete
							</a>
						</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection