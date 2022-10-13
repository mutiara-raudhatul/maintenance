@extends('layout/template')

@section('title', 'Jenis Check Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Jenis Check Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Jenis Check Maintenance</h2>
                    </header>
                    <div class="panel-body">



                        <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-md">
                                            <a href="/tambah-jenis-check">
                                            <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped mb-none" id="">
                                    <thead>
                                        <tr>
                                            <th>ID Jenis Check</th>
                                            <th>Jenis Check</th>
                                            <th>Tipe Check</th>
                                            <th>Jenis Maintenance</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dtJenisC as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->id_jenis_check}}</td>
                                            <td>{{$item->jenis_check}}</td>
                                            <td>{{$item->tipe_check}}</td>
                                            <td>{{$item->jenis_maintenance}}</td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="/update-jenis-check" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a href="{{url('delete-jenis-check',$item->id_jenis_check)}}" class="on-default remove-row"onclick="return confirm('Apakah Yakin Hapus Data Ini?')"" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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