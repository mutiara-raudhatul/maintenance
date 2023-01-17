@extends('layout/template')

@section('title', 'Detail Maintenance Teknisi')


<!-- start: page -->
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Maintenance Teknisi</h2>
    
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
        
                        <h2 class="panel-title">Detail Maintenance Teknisi</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row g-3 panel-body">
                        <h5 style="font-size: 13pt;">Permintaan Maintenance</h5><hr style="margin-top:-8px" >
                        <div class="col-md-5">
                            <label for="kelebihan" > Tanggal Permintaan</label>
                            <input class="form-control" placeholder="Ceritakan kelebihan Anda" id="kelebihan" name="kelebihan" value="{{date('d M Y',strtotime($data->tanggal_permintaan))}}" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="email" class="form-label">Jenis Barang</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->jenis_barang}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Keterangan</label>
                            <textarea type="email" class="form-control" id="email" name="email" value="" readonly>{{$data->keterangan}}</textarea>
                        </div>
                    </div>
                    <div class="row g-3 panel-body">
                        <h5 style="font-size: 13pt;">Respon Maintenance </h5><hr style="margin-top:-8px" >
                        <div class="col-md-4">
                            <label for="email" class="form-label">Teknisi</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->name}}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Jadwal Perbaikan</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{date('d M Y',strtotime($data->jadwal_perbaikan))}}" readonly>
                        </div>
                    </div>
                    <div class="row g-3 panel-body">
                        <h5 style="font-size: 13pt;">Maintenance Teknisi</h5><hr style="margin-top:-8px" >
                        <div class="col-md-4">
                            <label for="email" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="email" name="serial_number" value="{{$data->id_serial_number}}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Lama Pengerjaan</label>
                            <input type="text" class="form-control" id="email" name="lama_pengerjaan" value="{{$data->lama_pengerjaan}} hari" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="email" name="lokasi" value="{{$data->lokasi}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Note</label>
                            <textarea  class="form-control" id="email" name="note"  readonly>{{$data->note}}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Dokumen Hasil Maintenance</label>
                            <iframe width="600" height="400" name="upload_form_maintenance" src="{{asset('dokumen-hasil/'. $data->upload_form_maintenance)}}"  readonly>{{$data->upload_form_maintenance}}</iframe>
                        </div>
                    </div>
                    <div class="row g-3 panel-body">
                        <h5 style="font-size: 13pt;">Status Maintenance</h5><hr style="margin-top:-8px" >
                        @if ($data->status_maintenance=='Dilaporkan')
                            <!-- button detail -->
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-info">Dilaporkan</button>
                        @elseif($data->status_maintenance=='Diterima')
                            <!-- button detail -->
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-success">Diterima</button>
                        @else
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-success">Selesai</button>
                        @endif
                    </div>

                    </div>
                </section>
        
               
        
            </div>
        </div>
    <!-- end: page -->
</section>
				
@endsection
<!-- end: page -->
