@extends('layout/template')

@section('title', 'Update Status Permintaan Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Status Permintaan Barang</h2>
    
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
        
                        <h2 class="panel-title">Update Status Permintaan Barang</h2>
                    </header>
                    <div class="panel-body">
                    <form action="/update-status-permintaan/{{$updt->id_status_permintaan}}" class="form-horizontal form-bordered" method="POST">
                    {{csrf_field()}}
                            <!-- Input Biasa -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">ID Status</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="id_status_permintaan" value="{{$updt->id_status_permintaan}}">
                                </div>
                            </div>
                            <!-- Input Biasa -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Status</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="inputDefault" name="status_permintaan" value="{{$updt->status_permintaan}}">
                                </div>
                            </div>
                        
                    
                    </div>
                    <footer class="panel-footer" >
                        <button class="btn btn-primary">Submit </button>
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
