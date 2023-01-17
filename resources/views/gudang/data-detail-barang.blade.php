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
													<input value="" type="text" value="1" id="inputReadOnly" class="form-control" readonly="readonly">
												</div>
										</div>
									</div>
									<!-- <a href="#" class="fa fa-caret-down"></a> -->
									<!-- <th class="center">Jumlah</th> -->
								</div>
								
								<h2 class="panel-title">Detail Barang</h2>
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
                                    @foreach($dataDetail as $details)
										<tr class="gradeX">
                                            <td>{{$no++}}</td>
                                            <td>{{$details->id_serial_number}}</td>
											<td class="center">{{$details->asset_tag}}</td>
											@if($details->hostname == null)
                                            <td class="center"><i>Belum Ada User</i></td>
											@else
											<td class="center">{{$details->hostname}}</td>
											@endif
                                            <td class="center">{{$details->status_barang}}</td>
											<th class="center">
								                <!-- <a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a> -->
							                	<a href="/update-barang/{{$details->id_barang}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <!-- <a href="{{url('delete-barang',$details->id_barang)}}" class="on-default remove-row"onclick="return confirm('Apakah Yakin Hapus Data Ini?')"" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> -->
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
