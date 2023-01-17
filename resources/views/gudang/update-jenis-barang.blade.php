@extends('layout/template')

@section('title', 'Update Jenis Barang')


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
        
                        <h2 class="panel-title">Update Jenis Barang</h2>
                    </header>
                    <form class="form-horizontal form-bordered" method="post" action="/update-jenis-barang/{{$editJs->id_jenis_barang}}">
                    {{ csrf_field()}}
                        <div class="panel-body">
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">Jenis</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="inputDefault" value="{{$editJs->jenis_barang}}" name="jenis_barang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">Kode</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="inputDefault" value="{{$editJs->kode_barang}}" name="kode_barang">
                                    </div>
                                </div>
                                <div class="form-group">
								    <label class="col-md-3 control-label" for="inputSuccess">Jenis Maintennace</label>
								    <div class="col-md-6">
                                     <select class="form-control mb-md @error('id_jenis_maintenance') is-invalid @enderror" aria-label="Default select example" id="id_jenis_maintenance" name="id_jenis_maintenance" required>
                                            <option value="" selected disabled>Pilih Jenis Maintenance</option>
                                            <option value="{{$editJs->id_jenis_maintenance}}" selected>{{$editJs->jenis_maintenance}}</option>
                                            @foreach ($EditdtIDJenisMaintenance as $item)
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
