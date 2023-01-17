@extends('layout/template')

@section('title', 'Dashboard Admin Gudang')

<!-- start: page -->
@section('content')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Barang Masuk</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Barang Masuk</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					
					<!-- start: page perangkat-->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
						
										<h2 class="panel-title">Perangkat</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="post" action="{{ route('simpan-barang') }}" onsubmit="return confirm('yakin submit data barang ?')">
										{{ csrf_field()}}
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Jenis Barang</label>
												<div class="col-md-6">
													<select class="form-control mb-md @error('id_jenis_barang') is-invalid @enderror" aria-label="Default select example" id="id_jenis_barang" name="id_jenis_barang" required>
														<option value="" selected disabled>Pilih Jenis Perangkat</option>
                                                        @foreach ($jenis_barang as $item)
														<option value="{{ $item->id_jenis_barang }}">{{ $item->jenis_barang }}</option>
														@endforeach
													</select>
													@error('jenis_barang')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
              										@enderror
												</div>
											</div>

											<div class="form-group">
												<label id="id_serial_number" name="id_serial_number" class="col-md-3 control-label" for="inputPlaceholder" required>Serial Number</label>
												<div class="col-md-6">
													<input type="text" class="form-control" placeholder="Name" id="inputPlaceholder" name="id_serial_number"  >
												</div>
												@error('id_serial_number')
												<div class="col-md-6 control-label invalid-feedback">
													{{ $message }}
												</div>
												@enderror
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Model Barang</label>
												<div class="col-md-6">
													<select class="form-control mb-md @error('id_model_barang') is-invalid @enderror" aria-label="Default select example" id="id_model_barang" name="id_model_barang" required>
														<option value="" selected disabled>Pilih Jenis Perangkat</option>
                                                        @foreach ($model_barang as $item)
														<option value="{{ $item->id_model_barang }}">{{ $item->model_barang }}</option>
														@endforeach
													</select>
													@error('jenis_barang')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
              										@enderror
												</div>
											</div>

									</div>
								</section>
							</div>
						</div>
				
					<!-- asset tag & hostname -->
						<div class="row" >
							<div class="col-md-6">
								<!-- <form id="form1" class="form-horizontal"> -->
									<div class="form-horizontal">

									<section class="panel">

										<header class="panel-heading">
											<div class="panel-actions">
												<a href="#" class="fa fa-caret-down"></a>
												<!-- <a href="#" class="fa fa-times"></a> -->
											</div>

											<h2 class="panel-title">Asset Tag</h2>
											<p class="panel-subtitle">
												Enter the input so that it becomes a code like the following 
												<br/><code>SIPDG201904-03-NB-00001</code>.
											</p>
										</header>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-4 control-label">Kode SIPDG</label>
												<div class="col-md-8">
													<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
														<div>
															<input name="kode_perusahaan" value="{{$kode_perusahaan}}" type="text" class="spinner-input form-control" maxlength="3" readonly>
															<div class="spinner-buttons input-group-btn btn-group-vertical">
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label" required>Date of Entry</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input name="bulan_tahun" value="{{date('Ym')}}" type="text"  data-plugin-masked-input class="form-control" readonly>
														@error('date')
														<div class="col-md-6 control-label invalid-feedback">
															{{ $message }}
														</div>
														@enderror
													</div>
												</div>
											</div>
										</div>
										<footer class="panel-footer">
                                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Submit</button>
                                    	<button type="reset" class="mb-xs mt-xs mr-xs btn btn-default btn-sm btn-block">Reset</button>
										</footer>
									</section>
								<!-- </form> -->
								</div>

							</div>


										</form>
							
							</div>
						</div>
				
				</section>
@endsection
<!-- end: page -->

