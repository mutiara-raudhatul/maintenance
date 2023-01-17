@extends('layout/template')

@section('title', 'Dashboard Edit User')

<!-- start: page -->
@section('content')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Data User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Edit Data User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
						
										<h2 class="panel-title">Edit Data User</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="/edit-user/{{$updt->id}}" method="post">
											@csrf
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="username">Username</label>
												<div class="col-md-6">
													<input  type="text" value="{{$updt->username}}" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-6">
													<input  type="text" value="{{$updt->name}}"  id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
												</div>
</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="nip">NIP</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
																<!-- <i class="fa fa-plus"></i> -->
														</span>
														<input required type="number" value="{{$updt->nip}}"  id="nip" name="nip" data-plugin-masked-input data-input-mask="9999" placeholder="__ __ __ __" class="form-control @error('nip') is-invalid @enderror">
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="role">Role</label>
												<div class="col-md-6">
													<select required name="role" id="role" class="form-control mb-md">
														<option value="{{$updt->role}}" hidden selected>{{$updt->role}}</option>
														<option value="Karyawan">Karyawan</option>
														<option value="Teknisi">Teknisi</option>
														<option value="Admin Teknisi">Admin Teknisi</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="unit_kerja">Work Unit</label>
												<div class="col-md-6">
													<input  type="text" value="{{$updt->unit_kerja}}" id="unit_kerja" name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" placeholder="Unit Kerja" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="eselon">Eselon</label>
												<div class="col-md-6">
													<select required name="eselon" id="eselon" class="form-control mb-md">
														<option value="{{$updt->eselon}}" hidden selected><i>{{$updt->eselon}}</i></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="nohp">Phone</label>
													<div class="col-md-6 control-label">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-phone"></i>
															</span>
															<input required value="{{$updt->nohp}}" type="number" id="nohp" name="nohp" placeholder="08xxxxxxxxxx" class="form-control">
														</div>
													</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="email">E-Mail</label>
												<div class="col-md-6">
													<section class="form-group-vertical">
														<input required value="{{$updt->email}}" class="form-control" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
													</section>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="password">Password</label>
												<div class="col-md-6">
													<section class="form-group-vertical">
														<input required value="{{$updt->password}}" class="form-control last" type="password" name="password" id="password" placeholder="Password">
													</section>
												</div>
											</div>
						
												<div class="row">
													<div class="col-sm-9 col-sm-offset-7">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
										</form>
									</div>
								</section>

				</section>
@endsection
<!-- end: page -->
