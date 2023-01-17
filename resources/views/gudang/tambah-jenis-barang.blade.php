@extends('layout/template')

@section('title', 'Tambah Jenis Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Jenis Barang</h2>
    
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
        
                        <h2 class="panel-title">Tambah Jenis Barang</h2>
                    </header>
                    <form class="form-horizontal form-bordered" action="{{route('simpan-jenis-barang')}}" method="post">
                    {{ csrf_field()}}
                    <div class="panel-body">

                            
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">ID Status</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="id_status_maintenance" name="id_status_maintenance">
                                </div>
                            </div> -->
                            <!-- Input Biasa -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Jenis</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Kode Barang</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                                </div>
                            </div>
                            <!-- <div class="form-group">
								<label class="col-md-3 control-label" for="inputSuccess">Kode Barang</label>
								<div class="col-md-6">
                                    <select class="form-control mb-md @error('id_jenis_maintenance') is-invalid @enderror" aria-label="Default select example" id="id_jenis_maintenance" name="id_jenis_maintenance" required>
                                        <option value="" selected disabled>Pilih Kode Barang</option>
                                        @foreach ($dtKode as $item)
                                        <option value="{{ $item->id_jenis_barang }}">{{ $item->kode_barang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
								<label class="col-md-3 control-label" for="inputSuccess">Jenis Maintennace</label>
								<div class="col-md-6">
                                    <select class="form-control mb-md @error('id_jenis_maintenance') is-invalid @enderror" aria-label="Default select example" id="id_jenis_maintenance" name="id_jenis_maintenance" required>
                                        <option value="" selected disabled>Pilih Jenis Maintenance</option>
                                        @foreach ($dtIDJenisMaintenance as $item)
                                        <option value="{{ $item->id_jenis_maintenance }}">{{ $item->jenis_maintenance}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                    </div>
                    <footer class="panel-footer" >
                        <button class="btn btn-primary" type="submit">Submit </button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </footer>
                    </form>
                </section>
        
               
        
            </div>
        </div>
    <!-- end: page -->
</section>
				
@endsection
<!-- end: page -->
