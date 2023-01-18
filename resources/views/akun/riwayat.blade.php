@extends('akun/app')
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
						<th style="width: 10%">
							Nama Pelanggan
						</th>
						<th style="width: 10%">
							Alamat
						</th>
						<th>
							No HP
						</th>
						<th>
							Jenis
						</th>
						<th>
							Berat
						</th>
						<th>
							Layanan
						</th>
						<th>
							Status
						</th>
						<th>
							Harga
						</th>
						<th>
							Pembayaran
						</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no = 1 ?>
                    @foreach($history as $historys)
					<tr>
						<td>
							{{ $no++ }}
						</td>
						<td>
							{{ $historys->nama }}
						</td>
						<td>
							{{ $historys->alamat }}
						</td>
						<td>
							{{ $historys->nomorhp }}
						</td>
						<td>
							<?php
                            if($historys->jenis == 1){
                                echo "Kilat (3 Jam)";
                            } elseif ($historys->jenis == 2) {
                                echo "Satu Hari Laundry";
                            } elseif ($historys->jenis == 3) {
                                echo "Dua Hari Laundry";
                            } else {
                                echo "Data tidak ditemukan";
                            }
                            ?>
						</td>
						<td>
							{{ $historys->berat }} kg
						</td>
						<td>
							<?php
                            if($historys->layanan == 1){
                                echo "Antar dan Jemput Sendiri (FREE)";
                            } elseif ($historys->layanan == 2) {
                                echo "Pickup dan Delivery Service - Rp 3000,-";
                            } else {
                                echo "Data tidak ditemukan";
                            }
                            ?>
						</td>
						<td>
							{{ $historys->status }}
						</td>
						<td>
							Rp {{ $historys->harga }}
						</td>
						<td>
							<?php
                            if($historys->pembayaran == 1){
                                echo "Transfer (BCA: 1234567890)";
                            } elseif ($historys->pembayaran == 2) {
                                echo "Cash";
                            } else {
                                echo "Data tidak ditemukan";
                            }
                            ?>
						</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection