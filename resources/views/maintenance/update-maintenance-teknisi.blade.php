@extends('layout/template')

@section('title', 'Form Update Maintenance Teknisi')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Update Maintenance Teknisi</h2>
    
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
        
                        <h2 class="panel-title">Update Maintenance Teknisi</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="/update-maintenance-teknisi/{{$edit->id_maintenance_teknisi}}">
                            <!-- Input Date Range -->
                            @csrf
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">ID Permintaan Maintenance</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="id_permintaan_maintenance" value="{{$edit->id_permintaan_maintenance}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Lama Pengerjaan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="lama_pengerjaan" value="{{$edit->lama_pengerjaan}}">
                                </div>
                            </div>
                            
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
                                    <input type="text" class="form-control" id="inputDefault" name="id_barang" value="{{$edit->id_serial_number}}">
                                </div>
                            </div>
                            Input Select 
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate" name="id_jenis_barang">
                                        <option value="{{$edit->id_jenis_barang}}" selected>{{$edit->jenis_barang}}</option>
                                            @foreach ($barang as $item)
                                            <option value="{{ $item->id_jenis_barang }}">{{$item->jenis_barang}}</option>
                                        
                                            @endforeach 
                                        
                                        
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Barang</label>
                                <div class="col-md-6">
                                    <select class="form-control populate @error('id_barang') is-invalid @enderror" name="id_barang"  required>
                                        <option value="{{ $edit->id_barang }}" disabled selected>{{$edit->jenis_barang}} - {{$edit->model_barang}} - {{$edit->id_serial_number}}</option>
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
                            <!-- Input Biasa --> 
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Lokasi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="lokasi" value="{{$edit->lokasi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="upload_form_maintenance">Dokumen</label>
                                <div class="col-md-6">
                                    @if($edit->upload_form_maintenance)
                                        <embed type="application/pdf" src="{{asset('dokumen-hasil/'.$edit->upload_form_maintenance)}}" width="600" height="300">
                                    @endif
                                    <input class="form-control @error('upload_form_maintenance') is-invalid @enderror" type="file"  name="upload_form_maintenance" value="{{$edit->upload_form_maintenance}}" required>
                                    
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
                                    <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="note">{{$edit->note}}</textarea>
                                        <!-- <p>
                                            <code>max-length</code> set to 140.
                                        </p> -->            
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
