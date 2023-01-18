@extends('administrator/app')
@section('content')
<div class="content-wrapper">
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
@if(session()->has('success'))
    <p class="alert alert-success">{{ session()->get('success') }}</p>
@endif

@if(session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">@yield('title', $title)</h3>
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
						<th>
							Kode Jenis Laundry
						</th>
						<th>
							Nama Jenis Laundry
						</th>
						<th>
							Harga
						</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no = 1 ?>
                    @foreach($jenis as $jeniss)
					<tr>
						<td>
							{{ $no++ }}
						</td>
						<td>
							{{ $jeniss->jenis }}
						</td>
						<td>
							{{ $jeniss->nama_jenis }}
						</td>
						<td>
							{{ $jeniss->harga }}
						</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('editjenis', $jeniss->id_jenis) }}">
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