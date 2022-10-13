@extends('layout/template')

@section('title', 'List Permintaan Maintenance')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Maintenance</h2>
    
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
        
                        <h2 class="panel-title">Permintaan Maintenance</h2>
                    </header>
                    <div class="panel-body">


                                <table class="table table-bordered table-striped mb-none" id="">
                                    <thead>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataU as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->jenis_barang}}</td>
                                            <td>{{$item->tanggal_permintaan}}</td>
                                            <td>{{$item->status_maintenance}}</td>
                                            <td class="status">
                                                @if ($item->status_maintenance=='Dilaporkan')
                                                        <!-- button detail -->
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Dilaporkan</button>
                                                @else 
                                                        <!-- button detail -->
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-success">Diterima</button>
                                                @endif
                                            </td>
                                            <td class="actions">
                                                @if ($item->status_maintenance=='Dilaporkan')
                                                        <a href="{{url('update-permintaan-maintenance',$item->id_permintaan_maintenance)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning">Edit</button>
                                                        </a>
                                                        <!-- button cancel -->
                                                        <a href="{{url('cancel-permintaan-maintenance',$item->id_permintaan_maintenance)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" onclick="return confirm('Apakah Permintaan Maintenance Dibatalkan?')">Cancel</button>
                                                        </a>
                                                @endif
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
