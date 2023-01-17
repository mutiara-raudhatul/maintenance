@extends('layout/template')

@section('title', 'Dokumen Maintenance')


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
        
                        <h2 class="panel-title">Dokumen Maintenance</h2>
                    </header>
                    <div class="panel-body">

                                <table class="table table-bordered table-striped mb-none" >
                                    <thead>
                                        <tr>
                                            <th>ID Jenis Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Dokumen</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->id_jenis_barang}}</td>
                                            <td>{{$item->jenis_barang}}</td>
                                            <td>
                                                @if($item->template_form_maintenance)
                                                <a href="{{asset('template-doc/'. $item->template_form_maintenance)}}">{{$item->template_form_maintenance}}</a>
                                                    <iframe src="{{asset('template-doc/'. $item->template_form_maintenance)}}" frameborder="0" width="600" height="300"></iframe></td>
                                                @else
                                                    Dokumen belum ada
                                                @endif
                                            <td class="actions">
                                                
                                                <a href="/update-dokumen-maintenance/{{ $item->id_jenis_barang}}" class="on-default edit-row"><button class="btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i>Edit </i></button></a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </section>
        
               
        
            </div>
        </div>
    <!-- end: page -->
</section>
				
@endsection
<!-- end: page -->
