@extends('layout/template')

@section('title', 'Tambah Dokumen Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dokumen Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Tambah Dokumen Maintenance</h2>
                    </header>

                    <form class="form-horizontal form-bordered" method="post" action="/update-dokumen-maintenance/{id_jenis_barang}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                    <div class="panel-body">
                            <!-- Input Biasa -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="template_form_maintenance">Dokumen</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('dokumen') is-invalid @enderror" type="file"  name="template_form_maintenance">
                            @error('dokumen')
                            <div class="invalid-feedback">
                                 {{ $message }}
                            </div>
                            @enderror
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
