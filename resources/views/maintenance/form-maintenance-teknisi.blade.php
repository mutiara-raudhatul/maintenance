@extends('layout/template')

@section('title', 'Form Maintenance Teknisi')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Maintenance Teknisi</h2>
    
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
        
                        <h2 class="panel-title">Maintenance Teknisi</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="/simpan-maintenance-teknisi/{{$permintaan->id_permintaan_maintenance}}">
                            <!-- Input Date Range -->
                            @csrf
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Lama Pengerjaan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="lama_pengerjaan" required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label">Lama Pengerjaan</label>
                                    <div class="col-md-6">
                                        <div class="input-daterange input-group" data-plugin-datepicker>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" name="start">
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control" name="end">
                                        </div>
                                    </div>
                            </div>       --}}
                            <!-- Input Biasa -->
                            
                            <!-- Input select-->
                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label">Serial Number</label>
                                <div class="col-md-6">
                                    <select data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div>
                            </div>  --}}
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Serial Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="id_barang" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate @error('id_barang') is-invalid @enderror" name="id_barang"  required>
                                        <option label="Jenis Barang - Model Barang - Serial Number" disabled selected></option>
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id_barang }}">{{$item->jenis_barang}} - {{$item->model_barang}} - {{$item->id_serial_number}}</option>
                                        @endforeach 
                                    </select>
                                        @error('id_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <!-- Input Select -->
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate" name="id_jenis_barang" required>
                                        <option disabled selected>Jenis Barang</option>
                                            @foreach ($barang as $item)
                                            <option value="{{ $item->id_jenis_barang }}">{{$item->jenis_barang}}</option>
                                        
                                            @endforeach 
                                        
                                        
                                    </select>
                                </div>
                            </div> -->
                             <!-- <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Jenis Maintenance</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="id_jenis_maintenance" readonly>
                                </div>
                            </div>  -->
                            <!-- Input Biasa --> 
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Lokasi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="lokasi" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="upload_form_maintenance">Dokumen</label>
                                <div class="col-md-6">
                                    {{-- <embed type="application/pdf" src="{{asset('template-doc/'. $data->template_form_ma  intenance)}}" width="600" height="400"> --}}
                                    <input class="form-control @error('upload_form_maintenance') is-invalid @enderror" type="file"  name="upload_form_maintenance">
                                    
                            @error('upload_form_maintenance')
                            <div class="invalid-feedback">
                                 {{ $message }}
                            </div>
                            @enderror
                                </div>
                            </div>
                            <!-- Input TextArea -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textareaDefault">Note</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="note"></textarea>
                                        <!-- <p>
                                            <code>max-length</code> set to 140.
                                        </p> -->            
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                    <select class="form-control populate" name="status"  required>
                                        <option label="Status" disabled selected></option>
                                        <option value="2">Selesai Diperbaiki</option>
                                        <option value="3">Tidak Bisa Diperbaiki</option>
                                        
                                    </select>
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
