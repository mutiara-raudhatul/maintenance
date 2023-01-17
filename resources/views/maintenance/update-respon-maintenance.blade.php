@extends('layout/template')

@section('title', 'Form Respon Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Respon Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Update Respon Maintenance</h2>
                    </header>
                    <form class="form-horizontal form-bordered" method="post" action="/update-respon-maintenance/{{$edit->id_respon_maintenance}}">
                          {{ csrf_field()}}
                    <div class="panel-body">
                            <!-- Input select-->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Teknisi</label>
                                <div class="col-md-6">
                                    <select  class="form-control populate"  name="id_user">
                                      <option disabled selected>Teknisi</option>
                                      <option value="{{$edit->id}}" selected>{{$edit->name}}</option>
                                        @foreach ($user as $item)
                                          @if ($item->role=="teknisi")
                                        <option value="{{ $item->id }}">{{$item->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <!-- Input Date -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jadwal Perbaikan</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" name="jadwal_perbaikan" value="{{$edit->jadwal_perbaikan}}">
                                        </div>
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
