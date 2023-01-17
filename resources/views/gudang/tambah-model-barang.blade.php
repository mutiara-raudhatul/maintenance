@extends('layout/template')

@section('title', 'Tambah Model Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Model Barang</h2>
    
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
        
                        <h2 class="panel-title">Tambah Model Barang</h2>
                    </header>
                    <form class="form-horizontal form-bordered" action="{{route('simpan-model-barang')}}" method="post">
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
                                <label class="col-md-3 control-label" >Model</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="model_barang" name="model_barang">
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-md-3 control-label" for="inputSuccess">Jenis Barang</label>
								<div class="col-md-6">
                                    <select class="form-control mb-md @error('id_jenis_barang') is-invalid @enderror" aria-label="Default select example" id="id_jenis_barang" name="id_jenis_barang" required>
                                        <option value="" selected disabled>Pilih Jenis Barang</option>
                                        @foreach ($dtJenis as $item)
                                        <option value="{{ $item->id_jenis_barang }}">{{ $item->jenis_barang}}</option>
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
