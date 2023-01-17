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
                                <table class="table table-bordered table-striped mb-none">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Diminta Oleh</th>
                                            <th>Role</th>
                                            <th>Tanggal</th>
                                            <th>Surat Izin Permintaan</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1; ?>
                                    @foreach($data_permintaan as $minta)
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>{{$no++}}</td>
                                            <td>{{$minta->name}}</td>
                                            <td>{{$minta->role}}</td>
                                            <td>{{$minta->tanggal_permintaan }}</td>
                                            <!-- <td>{{$minta->surat_izin }}</td> -->
                                            <td>
                                                @if($minta->surat_izin)
                                                <a href="{{asset('template-doc/'. $minta->surat_izin)}}">{{$minta->surat_izin}}</a>
                                                    <!-- <iframe src="{{asset('template-doc/'. $minta->surat_izin)}}" frameborder="0" width="600" height="300"></iframe> -->
                                                @else
                                                    --
                                                @endif
                                            </td>
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
                                                <a href="{{url('detail-permintaan-barang',$minta->id_permintaan_barang)}}">
                                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Detail Permintaan</button>
                                                </a>
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
