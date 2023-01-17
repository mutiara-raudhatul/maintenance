@extends('layout/template')

@section('title', 'Form Detail Permintaan Barang')


<div class="inner-wrapper">

<!-- start: page -->
@section('content')
				
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Form Detail Permintaan Barang</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Basic</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

                        <div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
									<h2 class="panel-title">Form Detail Permintaan Barang</h2>
									</header>
									<div class="panel-body">

										<!-- start: page -->
						<section class="panel">
							
									<div class="panel-body">
											
											<table class="table table-bordered table-striped mb-none">
												<thead>
													<tr>
														<th>No</th>
														<th>Barang</th>
														<th>Jumlah</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php $no = 1; ?>
												@foreach($data_barang as $data)
													<tr class="gradeX">
														<td>{{$no++}}</td>
														<td>{{$data->jenis_barang}}</td>
														<td>{{$data->jumlah_permintaan}}</td>
														<td class="actions">

															<a href="{{url('/hapus-detail-kebutuhan',$data->id_detail_kebutuhan)}}" class="on-default remove-row"onclick="return confirm('Apakah Yakin Hapus Data Ini?')"><i class="fa fa-trash-o"></i></a>
														</td>
												
													</tr>
												@endforeach
												
											
												</tbody>
											</table>
										</div>

										<br>
										
									</div>
                                    <footer class="panel-footer" >
                                        	<button class="btn btn-primary">Selesai </button>
										
                                        	<button type="reset" class="btn btn-default">Cancel</button>
										</a>
                                    </footer>
								</section>
								<div id="dialog" class="modal-block mfp-hide">
									<section class="panel">
										<header class="panel-heading">
											<h2 class="panel-title">Are you sure?</h2>
										</header>
										<div class="panel-body">
											<div class="modal-wrapper">
												<div class="modal-text">
													<p>Are you sure that you want to delete this row?</p>
												</div>
											</div>
										</div>
										<footer class="panel-footer">
											<div class="row">
												<div class="col-md-12 text-right">
													<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
													<button id="dialogCancel" class="btn btn-danger">Cancel</button>
												</div>
											</div>
										</footer>
									</section>
								</div>
                        </div>
                    </div>
</section>


</div>
<!-- end: page -->

