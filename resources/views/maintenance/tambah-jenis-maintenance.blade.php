@extends('layout/template')

@section('title', 'Tambah Jenis Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Jenis Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Tambah Jenis Maintenance</h2>
                    </header>

                    <form class="form-horizontal form-bordered" method="post" action="{{route('simpan-jenis')}}">
                        {{ csrf_field()}}
                    <div class="panel-body">
                        
                            <!-- Input Biasa -->
                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_maintenance">ID Jenis Maintenance</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="jenis_maintenance" name="id_jenis_maintenance">
                                </div>
                            </div> --}}
                            <!-- Input Biasa -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_maintenance">Jenis Maintenance</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="jenis_maintenance" name="jenis_maintenance" required>
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
