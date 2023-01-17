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
                                            <th>Diminta Oleh</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->jenis_barang}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{date('d M Y',strtotime($item->tanggal_permintaan))}}</td>
                                            <td>{{$item->keterangan}}</td>
                                            <td class="status">
                                                @if ($item->status_maintenance=='Dilaporkan')
                                                        <!-- button detail -->
                                                            <span class="label label-info">Dilaporkan</span>
                                                @elseif($item->status_maintenance=='Diterima')
                                                        <!-- button detail -->
                                                            <span class="label label-warning">Diterima</span>
                                                @elseif($item->status_maintenance=='Selesai')
                                                            <!-- button detail -->
                                                            <span class="label label-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="actions">
                                            @if ($item->status_maintenance=='Dilaporkan')
                                                <!-- button detail -->
                                                <a href="{{url('form-respon-maintenance', $item->id_permintaan_maintenance)}}"  class="on-default remove-row"><button class="btn-xs btn-warning"><i class="fa fa-mail-forward"></i> Respon </button></a>
                                            @endif
                                            @if($item->status_maintenance=='Selesai')
                                            <a href="{{url('list-maintenance-teknisi', $item->id_permintaan_maintenance)}}"  class="on-default remove-row"><button class="btn-xs btn-info"><i class="fa fa-info-circle"></i> Detail </button></a>
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
