@extends('layout/template')

@section('title', 'List Maintenance Teknisi')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Maintenance Teknisi</h2>
    
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
        
                        <h2 class="panel-title">Maintenance Teknisi</h2>
                    </header>
                    <div class="panel-body">


                                <table class="table table-bordered table-striped mb-none" id="">
                                    <thead>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <th>Jadwal Perbaikan</th>
                                            <th>Dokumen</th>
                                            <th>Note</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr class="gradeX">
                                            <td>{{$item->jenis_barang}}</td>
                                            <td>{{date('d M Y',strtotime($item->jadwal_perbaikan))}}</td>
                                            <td><a href="{{asset('dokumen-hasil/'. $item->upload_form_maintenance)}}">{{$item->upload_form_maintenance}}</a></td>
                                            <td>{{$item->note}}</td>
                                            <td>{{$item->lokasi}}</td>
                                            <td class="status">
                                                 @if ($item->status_maintenance=='Dilaporkan')
                                                        <!-- button detail -->
                                                            <button class="btn btn-warning btn-xs">Belum Direspon </button>
                                                            <button class="btn btn-success btn-xs">Selesai </button>
                                                @elseif ($item->status_maintenance=='Diterima')
                                                        <button class="btn btn-success btn-xs">Diterima </button>
                                                @else
                                                        <button class="btn btn-success btn-xs">Selesai </button>

                                                @endif
                                            </td>
                                            <td class="actions">
                                                @if ($item->status_maintenance=='Diterima')
                                                        <a href="{{url('form-maintenance-teknisi',$item->id_permintaan_maintenance)}}">
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-xs">Respon</button>
                                                        </a>
                                                @elseif($item->status_maintenance=='Selesai')
                                                        <!-- button cancel -->
                                                            <a href="{{url('update-maintenance-teknisi',$item->id_permintaan_maintenance)}}">
                                                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-xs">Update</button>
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
