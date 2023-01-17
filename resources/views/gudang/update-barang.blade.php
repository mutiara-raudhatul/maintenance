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
										<form class="form-horizontal form-bordered" method="post" action="/update-barang/{{$data->id_barang}}" onsubmit="return confirm('yakin submit data barang ?')">
										{{ csrf_field()}}
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Jenis Barang</label>
												<div class="col-md-6">
													<select class="form-control mb-md @error('id_jenis_barang') is-invalid @enderror" aria-label="Default select example" id="id_jenis_barang" name="id_jenis_barang" required>
														<option value="" selected disabled>Pilih Jenis Perangkat</option>
                                                        <option value="{{$data->id_jenis_barang}}" selected>{{$data->jenis_barang}}</option>
                                                        @foreach ($edit_jenis_barang as $item)
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
												<label class="col-md-3 control-label" for="inputPlaceholder" required>Serial Number</label>
												<div class="col-md-6">
													<input value="{{$data->id_serial_number}}" type="text" class="form-control" placeholder="Name" id="inputPlaceholder" name="id_serial_number"  >
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
                                                        <option value="{{$data->id_model_barang}}" selected>{{$data->model_barang}}</option>
                                                        @foreach ($edit_model_barang as $item)
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

                                            <div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Status Barang</label>
												<div class="col-md-6">
													<select class="form-control mb-md @error('id_status_barang') is-invalid @enderror" aria-label="Default select example" id="id_status_barang" name="id_status_barang" required>
														<option value="" selected disabled>Pilih Status Barang</option>
                                                        <option value="{{$data->id_status_barang}}" selected>{{$data->status_barang}}</option>
                                                        @foreach ($edit_status_barang as $item)
														<option value="{{ $item->id_status_barang }}">{{ $item->status_barang }}</option>
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
												<label class="col-md-3 control-label">Asset Tag</label>
												<div class="col-md-6">
													<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
														<div>
															<input name="asset_tag" value="{{$data->asset_tag}}" type="text" class="spinner-input form-control" maxlength="3" readonly>
															<div class="spinner-buttons input-group-btn btn-group-vertical">
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</br>
									</div>
                                    <footer class="panel-footer">
                                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Submit</button>
                                    	<button type="reset" class="mb-xs mt-xs mr-xs btn btn-default btn-sm btn-block">Reset</button>
									</footer>
								</section>
							</div>
						</div>
				
					
								</div>

							</div>


										</form>
							
							</div>
						</div>
				
				</section>
@endsection
<!-- end: page -->

