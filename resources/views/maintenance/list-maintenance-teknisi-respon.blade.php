 @extends('layout/template')

@section('title', 'List Respon Maintenance Teknisi')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Respon Maintenance Teknisi</h2>
    
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
        
                        <h2 class="panel-title">Respon Maintenance Teknisi</h2>
                    </header>
                    <div class="panel-body">


                                <table class="table table-bordered table-striped mb-none" id="">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Permintaan</th>
                                            <th>Jenis Barang</th>
                                            <th>Keterangan</th>
                                            <th>Jadwal Perbaikan</th>
                                            <th>Dokumen</th>
                                            <th>Note</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr class="gradeX">
                                            <td>{{date('d M Y',strtotime($item->tanggal_permintaan))}}</td>
                                            <td>{{$item->jenis_barang}}</td>
                                            <td>{{$item->keterangan}}</td>
                                            <td>{{date('d M Y',strtotime($item->jadwal_perbaikan))}}</td>
                                            <td>@if($item->id_maintenance_teknisi)
                                                <a href="{{asset('dokumen-hasil/'. $item->upload_form_maintenance)}}">{{$item->upload_form_maintenance}}</a></td>
                                                @else
                                                    Belum ada respon teknisi
                                                @endif
                                            <td>@if($item->id_maintenance_teknisi)
                                                {{$item->note}}
                                                @else
                                                    Belum ada respon teknisi
                                                @endif</td>
                                            <td>@if($item->id_maintenance_teknisi)
                                                {{$item->lokasi}}
                                                @else
                                                    Belum ada respon teknisi
                                                @endif</td>
                                            <td class="status">
                                                 @if ($item->status_maintenance=='Diterima')
                                                        <!-- button detail -->
                                                        <span class="label label-warning">Diterima </span>
                                                @else
                                                        <span class="label label-success">Selesai </span>

                                                @endif
                                            </td>
                                            <td class="actions">
                                            @if ($item->status_maintenance=='Diterima')
                                                        <!-- button detail -->
                                                        <a href="/form-maintenance-teknisi/{{ $item->id_permintaan_maintenance}}">
                                                            <button class="btn-xs btn-warning"><i class="fa fa-mail-forward"></i>Respon </button>
                                                        </a>
                                                @else
                                                    <a href="/update-maintenance-teknisi/{{ $item->id_maintenance_teknisi}}">
                                                        <button class="btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i>Edit </button>
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
