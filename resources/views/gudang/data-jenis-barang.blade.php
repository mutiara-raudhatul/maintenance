@extends('layout/template')

@section('title', 'Dashboard Admin Gudang')

<!-- start: page -->
@section('content')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Data Barang</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Data Barang</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					
                    <section class="panel">
							<header class="panel-heading">
                                <div class="panel-actions">
									<div class="form-group">
										<label class="col-md-6 control-label">
											<h2 class="panel-title">Jumlah:</h2>
										</label>
										
										<div class="form-group">
											<label control-label" for="inputReadOnly"></label>
												<div class="col-md-6">
													<input value="<?php echo $jumlah ?>" type="text" value="1" id="inputReadOnly" class="form-control" readonly="readonly">
												</div>
										</div>

										<!-- <div class="col-md-4">
											<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
												<div>
													<input type="text" class="spinner-input form-control" maxlength="3" readonly>
													<div class="spinner-buttons input-group-btn btn-group-vertical">
													</div>
												</div>
											</div>
										</div> -->
									</div>
									<!-- <a href="#" class="fa fa-caret-down"></a> -->
									<!-- <th class="center">Jumlah</th> -->
								</div>
								
								<h2 class="panel-title">Perangkat</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Jenis Perangkat</th>
											<th class="center">Jumlah</th>
                                            <th class="center">Action</th>
                                        </tr>	
											
									</thead>
									<tbody>
									@if($jumlah>0)
                                    @for($i=0; $i<$jumlah; $i++)
										<tr class="gradeX">
                                            <td>{!!substr(json_encode($jenisnya[$i]),1,-1)!!}</td>
											<td class="center">{!!json_encode($jumlah_jenis[$i])!!}</td>
											<th class="center">
								                <a href="{{url('data-model-barang', $idjenisnya[$i])}}"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Detail</button> </a>
							                </th>
										</tr>
                                    @endfor
									@elseif ($jumlah==0)
										<tr class="gradeX">
                                            data tidak ada
										</tr>
									@endif
									</tbody>
								</table>
							</div>
						</section>
						
				</section>
@endsection
<!-- end: page -->
