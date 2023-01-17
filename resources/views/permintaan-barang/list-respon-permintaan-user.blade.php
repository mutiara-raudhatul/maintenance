@extends('layout/template')

@section('title', 'List Respon Permintaan')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Respon Permintaan</h2>
    
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
        
                        <h2 class="panel-title">Respon Permintaan</h2>
                    </header>
                    <div class="panel-body">


                                <table class="table table-bordered table-striped mb-none" id="">
                                    <thead>
                                        <tr>
                                            <th>Pemohon</th>
                                            <th>Tanggal Permintaan</th>
                                            <th>Tanggal Pengadaan</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->tanggal_permintaan}}</td>
                                            <td>{{$item->waktu_pengadaan}}</td>
                                            <!-- <td>{{$item->status_permintaan}}</td> -->
                                            <td class="status">
                                                @if ($item->status_permintaan=='Diajukan')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-warning btn-sm">Diajukan</button>
                                                @elseif($item->status_permintaan=='Diterima')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-success btn-sm">Diterima</button>
                                                @elseif($item->status_permintaan=='Ditolak')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif
                                            </td>
                                            <td class="actions">
                                                @if ($item->status_permintaan=='Diterima')
                                                        <!-- button detail -->
                                                        <a href="{{url('detail-respon-permintaan-user',$item->id_respon_permintaan)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Detail Respon</button>
                                                        </a>
                                                @else 
                                                <!-- <a href="{{url('detail-respon-permintaan',$item->id_respon_permintaan)}}">
                                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Detail Respon</button>
                                                </a> -->
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
