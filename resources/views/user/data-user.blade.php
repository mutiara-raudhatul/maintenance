@extends('layout/template')

@section('title', 'Dashboard Admin Gudang')

<!-- start: page -->
@section('content')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Data User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Data User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
	
                    <section class="panel">
							<header class="panel-heading">
								
								<div class="panel-actions">
									<div class="form-group">
										<label class="col-md-12 control-label"><h5>Jumlah : {{ $countUser }}</h5></label>
										
										<div class="col-md-4">
											<div data-plugin-spinner data-plugin-options='{ "disabled": true }'>
												<div>
													<div class="spinner-buttons input-group-btn btn-group-vertical">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
								</div>
							<h2 class="panel-title">Data User</h2>
							</header>
							<div style="background-color:white;">
							<br>
								<div class="col-md-6">
										<a href="/registrasi">
										<button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
										</a>
                                </div>		
							</div>
							<div class="panel-body">	
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
									<thead>
										<tr>
											<th>Nama</th>
											<th class="center">Username</th>
											<th class="center">NIP</th>
                                            <th class="center">Work Unit</th>
											<th class="center">Email</th>
											<th class="center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($dtUsers as $item)
										<tr class="gradeX">
											<td>{{ $item -> name}}</td>
											<td class="center">{{ $item -> username}}</td>
											<td class="center">{{ $item -> nip}}</td>
											<td class="center">{{ $item -> unit_kerja}}</td>
											<td class="center">{{ $item -> email}}</td>
											<td class="center">
                                                <a href="{{url('edit-user',$item->id)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a href="{{url('delete-user',$item->id)}}" class="on-default remove-row"onclick="return confirm('Apakah Yakin Hapus Data Ini?')"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div>
								<p><br></p>
							</div>
						</section>
                    
				</section>
@endsection
<!-- end: page -->
