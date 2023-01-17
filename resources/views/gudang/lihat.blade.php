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
											<h2 class="panel-title">Jumlah : </h2>
										</label>
										
										<div class="col-md-4">
											<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
												<div>
													<input type="text" class="spinner-input form-control" maxlength="3" readonly>
													<div class="spinner-buttons input-group-btn btn-group-vertical">
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- <a href="#" class="fa fa-caret-down"></a> -->
									<!-- <th class="center">Jumlah</th> -->
								</div>
								
								<h2 class="panel-title">Komputer/PC</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No.</th>
											<th class="center">Serial Number</th>
                                            <th class="center">Asset Tag</th>
                                            <th class="center">Hostname</th>
                                            <th class="center">Status</th>
                                            <th class="center">Action</th>
                                        </tr>	
											
									</thead>
									<tbody>
                                    <?php $no = 1; ?>
                                    @foreach($lihat as $details)
										<tr class="gradeX">
                                            <td>{{$no++}}</td>
                                            <td>{{$details->id_serial_number}}</td>
											<td class="center">{{$details->asset_tag}}</td>
                                            <td class="center">{{$details->hostname}}</td>
                                            <td class="center">{{$details->status_barang}}</td>
											<th class="center">
								                <a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a>
							                </th>
										</tr>
                                    @endforeach
									</tbody>
								</table>
							</div>
						</section>
                    
				</section>
@endsection
<!-- end: page -->
