@extends('layout/template')

@section('title', 'History Karyawan')


<!-- start: page -->
@section('content')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>History</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>History</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>	

					<div class="row">
							<div class="col-xl-6 col-lg-12">
							<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										
									</div>

									<h2 class="panel-title">Status Permintaan Maintenance</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Maintenance</th>
													<th>Unit Kerja</th>
													<th>Tanggal Permintaan</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											@foreach ($dtHistoryKM as $KM)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $KM->jenis_barang }}</td>
													<td>{{ $KM->unit_kerja }}</td>
													<td>{{ date('d M Y', strtotime($KM->tanggal_permintaan)) }}</td>
													<td>
														@if ($KM->status_maintenance=='Dilaporkan')
															<span class="label label-info">{{ $KM->status_maintenance }}</span>
														@elseif ($KM->status_maintenance=='Diterima')
															<span class="label label-warning">{{ $KM->status_maintenance }}</span>
														@else
															<span class="label label-success">{{ $KM->status_maintenance }}</span>
														@endif
													</td>												
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</section>
							<section class="panel">
									<header class="panel-heading panel-heading-transparent">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											
										</div>
										<h2 class="panel-title">Aktivitas Harian</h2>
									</header>
									<div class="panel-body panel-heading-transparent timeline" >
									<div class="tm-body">
										@foreach ($by as $p)
											<div class="tm-title">
												<h3 class="h5 text-uppercase">{{ $bulannn = date('F Y', strtotime($p->month_year))}}</h3>
											</div>													
											@foreach ($dtHistoryKM as $dh)
												@if($bulannn==date('F Y', strtotime($dh->tanggal_permintaan)))
													<ol class="tm-items">
														<li>
															<div class="tm-info">
																<div class="tm-icon"><i class="fa fa-circle"></i></div>
																<time class="tm-datetime">
																	<!-- <div class="tm-datetime-date">Today.</div> -->
																	<div class="tm-datetime-time">{{ date('d M', strtotime($dh->tanggal_permintaan)) }}</div>
																</time>
															</div>
															<div class="tm-box appear-animation" data-appear-animation="fadeInRight"data-appear-animation-delay="100">
																<p>
																	{{ $dh->name }} mengajukan permintaan maintenance {{ $dh->jenis_barang }}  di  {{ $dh->unit_kerja }}. 
																	<br>Status maintenance <span class="text-primary"> #{{ $dh->status_maintenance}}</span>
																</p>
																<div class="tm-meta">
																	<span>
																		<i class="fa fa-user"></i> By <a href="#">{{ $dh->name }}</a>
																	</span>
																	<span>
																		<i class="fa fa-map-marker"></i> <a href="#">{{ $dh->unit_kerja }}</a>
																	</span>
																	<span>
																		<i class="fa fa-tag"></i> <a href="#">{{ $dh->status_maintenance }}</a>
																	</span>
																</div>
															</div>
														</li>
													</ol>
												@endif
											@endforeach
										@endforeach
									</div>
								</div>
							</section>
					</div>	
				</section>
@endsection
<!-- end: page -->

			