@extends('layout/template')

@section('title', 'Form Update Permintaan Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Update Permintaan Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Update Permintaan Maintenance</h2>
                    </header>
                    <form class="form-horizontal form-bordered" method="post" action="/update-permintaan-maintenance/{{$editSt->id_permintaan_maintenance}}">
                        {{ csrf_field()}}
                    <div class="panel-body">
                        
                            <!-- Input Biasa -->
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Default</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault">
                                </div>
                            </div> -->
                            <!-- Input Select -->
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate" name="id_jenis_barang">
                                        <optgroup label="Jenis Barang">
                                        <option value="{{$editSt->id_jenis_barang}}" selected>{{$editSt->jenis_barang}}</option>
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id_jenis_barang }}">{{$item->jenis_barang}}</option>
                                        @endforeach 
                                        </optgroup>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate @error('id_jenis_barang') is-invalid @enderror" name="id_jenis_barang"  required>
                                    <option value="{{ $editSt->id_jenis_barang }}" disabled selected>{{$editSt->jenis_barang}}</option>
                                        <!-- <option value="{{ $editSt->id_jenis_barang }}">{{$editSt->jenis_barang}}</option> -->
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id_jenis_barang }}">{{$item->jenis_barang}} - {{$item->model_barang}} - {{$item->id_serial_number}}</option>
                                        @endforeach 
                                    </select>
                                        @error('id_jenis_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <!-- Input Date -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" name="tanggal_permintaan" value="{{$editSt->tanggal_permintaan}}" min="date('Today')">
                                        </div>
                                    </div>
                            </div>
                            <!-- Input TextArea -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textareaDefault">Masalah yang terjadi</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="200" name="keterangan">{{$editSt->keterangan}}</textarea>
                                        <p>
                                            <code>max-length</code> set to 200.
                                        </p>            
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
