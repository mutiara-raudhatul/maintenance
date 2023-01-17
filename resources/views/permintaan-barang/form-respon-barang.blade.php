@extends('layout/template')

@section('title', 'Form Respon Permintaan Barang')

<style>

.center {
  margin: 0;
  position: relative;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, 50%);
  transform: translate(40%, -170%);
  border : none;
  padding: 7px;


  background-color:  #3498DB ;
  border-radius: 4px;
  color: white;
}

.center: hover {
  box-shadow: inset 0 0 0 20rem var(--darken-1);
}
</style>
	
<div class="inner-wrapper">

<!-- start: page -->
@section('content')


<section role="main" class="content-body">
    
					<header class="page-header">
						<h2>Form Respon Permintaan Barang</h2>

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
						
									    <h2 class="panel-title">Respon Permintaan Barang Dipenuhi</h2>
									</header>
									
                                    <div class="panel-body">
											<form class="form-horizontal form-bordered" action="/tambah-barang-dipenuhi" method="POST" >
												{{ csrf_field()}}

											<div class="form-group">
												<label class="col-md-2 control-label">Barang</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate" name="id_barang" required>
													<option selected disabled value="">Pilih Barang</option>  
														
														@foreach ($respon as $item)
															@if($item->status_barang=='Tersedia')
																<option value="{{ $item->id_barang }}">{{$item->jenis_barang}} - {{$item->model_barang}} - {{$item->id_serial_number}}</option>
															@endif
														@endforeach
													
													</select>
												</div>
											</div>
											<div class="form-group" hidden>
												
												<div class="col-md-6">
												@foreach ($id_terakhir as $item)
													<input name="id_terakhir" type="hidden" id="inputReadOnly" class="form-control" readonly="readonly" value="{{ $item->id_respon_permintaan}}" required>
												@endforeach
												</div>
											</div>
                                
                                            <div class="form-group">
												<!-- <label class="col-md-2 control-label" for="inputDefault">Jumlah Barang</label> -->
												<div class="col-md-6">
													<input name="jumlah_dipenuhi" value='1' type="hidden" min = '1' class="form-control" id="inputDefault" required>
												</div>
											</div>
											
                                            <br><br><br>

												<button type= "submit" class="center">Tambah Barang</button>			
                                          
										</form>
                                    
                                        <!-- <div class="panel-body"> -->
										<div class="table-responsive">
											<table class="table table-bordered mb-none">
												<thead>
													<tr>
														<th>No</th>
														<th>Jenis Barang</th>
														<th>Model Barang</th>
														<th>Serial Number</th>
														<th>Asset Tag</th>
														<th>Hostname</th>
                                                        <th>Aksi</th>
													</tr>
												</thead>
												<tbody>	
												<?php $no = 1; ?>
												@foreach($data_barang as $item)
													<tr>
														<td>{{$no++}}</td>
														<td>{{ $item->jenis_barang }}</td>
														<td>{{ $item->model_barang }}</td>
														<td>{{ $item->id_serial_number }}</td>
														<td>{{ $item->asset_tag }}</td>
														<td>{{ $item->hostname }}</td>
						
                                                        <td>
														<a href="{{url('/hapus-detail-dipenuhi',$item->id_detail_barang_dipenuhi)}}" class="on-editing cancel-row"><i class="fa fa-times"></i></a>
														</td>
													</tr>
												@endforeach  
													
												</tbody>
											</table>
										</div>
                                    <br> 
                                    <br> 
									<footer class="panel-footer" >
											<a href="/permintaan-barang">
                                        		<button class="btn btn-primary">Selesai</button>
											</a>
											@foreach ($id_terakhir as $item)
											<a href="/cancel-respon/{{$item->id_respon_permintaan}}">
											@endforeach
												<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" onclick="return confirm('Apakah Respon Dibatalkan?')">Cancel</button>
											</a>
                                    </footer>
										
									</div>
								</section>
                            </div>
                        </div>

                   
									
							
</section>


</div>
<!-- end: page -->


