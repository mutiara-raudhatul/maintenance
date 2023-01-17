@extends('layout/template')

@section('title', 'List Permintaan Barang')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>List Permintaan Barang</h2>
    
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
                        <h2 class="panel-title">List Permintaan Barang</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-md">
                                    <a href="/form-permintaan">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                                <table class="table table-bordered table-striped mb-none">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Diajukan</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1; ?>
                                    @foreach($data_permintaan as $minta)
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>{{$no++}}</td>
                                            <td>{{$minta->tanggal_permintaan }}</td>
                                            <!-- <td>{{$minta->status_permintaan }}</td> -->
                                            <td class="status">
                                            @if ($minta->status_permintaan=='Diajukan')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-warning btn-sm">Diajukan</button>
                                                @elseif($minta->status_permintaan=='Diterima')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-success btn-sm">Diterima</button>
                                                @elseif($minta->status_permintaan=='Ditolak')
                                                        <!-- button detail -->
                                                            <button type="button" class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif
                                            </td>

                                            <td class="actions">

                                                @if ($minta->status_permintaan=='Diajukan')
                                                        <!-- button detail -->
                                                        <a href="{{url('detail-permintaan-barang-user',$minta->id_permintaan_barang)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Detail Permintaan</button>
                                                        </a>
                                                        <!-- button cancel -->
                                                        <a href="{{url('cancel-permintaan-barang',$minta->id_permintaan_barang)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" onclick="return confirm('Apakah Permintaan Dibatalkan?')">Cancel</button>
                                                        </a>
                                                @else 
                                                        <!-- button detail -->
                                                        <a href="{{url('detail-permintaan-barang-user',$minta->id_permintaan_barang)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Detail Permintaan</button>
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
</section>
@endsection
<!-- end: page -->
