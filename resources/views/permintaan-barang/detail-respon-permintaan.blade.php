@extends('layout/template')

@section('title', 'Detail Respon Permintaan Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Respon Permintaan Barang</h2>
    
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

    <!-- start: page -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                           
                        </div>
        
                        <h2 class="panel-title">Data Respon Permintaan</h2>
                    </header>

                    <div class="panel-body">
                    @foreach($data as $d)
                        <p class="mb-lg"> Nama Pemohon         :  {{ $d->name }} </p>
                        <p class="mb-lg"> Tanggal permintaan   :  {{ $d->tanggal_permintaan }}</p>   
                        <p class="mb-lg"> Tanggal Pengadaan   :  {{ $d->waktu_pengadaan }}</p> 
                    @endforeach     
                    </div>
                </section>	


                <div class="row">
							<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Tabel Barang Dipenuhi</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-none">
												<thead>
													<tr>
														<th>No</th>
                                                        <th>Serial Number</th>
														<th>Barang</th>
                                                        <th>Model Barang</th>
                                                        <th>Hostname</th>														
													</tr>
												</thead>
                                                <?php $no = 1; ?>
                                    			@foreach($data_detail as $detail)
												<tbody>
													<tr>
														<td>{{$no++}}</td>
                                                        <td>{{ $detail->id_serial_number }}</td>
														<td>{{ $detail->jenis_barang }}</td>
                                                        <td>{{ $detail->model_barang }}</td>
                                                        <td>{{ $detail->hostname }}</td>														
													</tr>
												</tbody>
                                                @endforeach
												
											</table>
										</div>
									</div>

                                    <footer class="panel-footer" >
                                        
                                        <a href="/list-respon-permintaan">
                                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Kembali</button>
                                        </a>
                                                                              
                                     
                                    </footer>
                                    </footer>
								</section>
							</div>

@endsection
<!-- end: page -->
