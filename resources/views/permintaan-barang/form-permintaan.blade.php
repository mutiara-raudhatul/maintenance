@extends('layout/template')

@section('title', 'Tambah Permintaan Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Permintaan</h2>
    
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
                            <!-- <a href="#" class="fa fa-times"></a> -->
                        </div>
        
                        <h2 class="panel-title">Tambah Permintaan Barang</h2>
                    </header>

					<form class="form-horizontal form-bordered" method="post" action="/tambah-permintaan-barang" enctype="multipart/form-data">
                        {{ csrf_field()}}
                    <div class="panel-body">
                        
                            <!-- Input Biasa -->
                            <div class="form-group">
								<label class="col-md-2 control-label">Tanggal Permintaan</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</span>
										
										<input name="tanggal_permintaan" type="date" id="inputReadOnly" class="form-control" readonly="readonly" value="{{ date('Y-m-d') }}">
									</div>
								</div>
							</div>
                            
                            @if (Auth::user()->role=='karyawan')
							<!-- Input Biasa --> 
							<div class="form-group">
								<label class="col-md-2 control-label" for="surat_izin">Surat Izin Permintaan</label>
								<div class="col-md-6">
									<input class="form-control @error('dokumen') is-invalid @enderror" type="file"  name="surat_izin" required>
									<small style="color:red">Upload surat hanya untuk karyawan</small>
										<!-- @error('dokumen') -->
										<div class="invalid-feedback">
											<!-- {{ $message }} -->
										</div>
										<!-- @enderror -->
								</div>
							</div>	
                            @endif
                        
                    </div>
                    <footer class="panel-footer" >
                        <button class="btn btn-primary" type="submit">Submit </button>
                        <a href="/permintaan-barang-user">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-default">Kembali</button>
                        </a>
                    </footer>
                    </form>
                </section>
            </div>
        </div>
    <!-- end: page -->
</section>
				
@endsection
<!-- end: page -->
