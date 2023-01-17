@extends('layout/template')

@section('title', 'Form Respon Permintaan Barang')

<style>

.center {
  margin: 0;
  position: relative;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, 30%);
  transform: translate(40%, -110%);
  border : none;
  padding: 7px;


  background-color:  #3498DB ;
  border-radius: 4px;
  color: white;
}

.center: hover {
  box-shadow: inset 0 0 0 20rem var(--darken-1);
}
</style>
	
<div class="inner-wrapper">

<!-- start: page -->
@section('content')


<section role="main" class="content-body">
    
					<header class="page-header">
						<h2>Form Respon Permintaan Barang</h2>

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

                        <div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
									    <h2 class="panel-title">Respon Permintaan Barang Dipenuhi</h2>
									</header>
									
                                    <div class="panel-body">                             
                                      
								<form class="form-horizontal form-bordered" method="post" action="/tambah-respon-permintaan" >
                                        {{ csrf_field()}}
                                        <div class="form-group">
                                                    <label class="col-md-2 control-label" for="inputSuccess">Teknisi Yang ditugaskan</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control mb-md" name="id_user_teknisi" required>   
                                                            <option selected disabled value="">Pilih Teknisi</option>                                                    
                                                            @foreach ($respon as $item)
                                                                @if ($item->role=="teknisi")
                                                                    <option value="{{ $item->id}}">{{$item->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                        </div>

                                        <?php
                                        $min_tanggal = date('Y-m-d');
                                        
                                        ?>
                                            <div class="form-group">
                                            <label class="col-md-2 control-label">Tanggal Pengadaan</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input name="waktu_pengadaan" type="date" class="form-control" min= "{{$min_tanggal}}"required>
                                                </div>
                                            </div>		
													<input name="id_simpan" type="hidden" id="inputReadOnly" class="form-control" readonly="readonly" value="{{$id_simpan}}" >											
                                            <br>
                                        </div>
                                        <br>
                                        <footer class="panel-footer" >
                                            <button type="submit" class="btn btn-primary">Submit </button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </footer>
								</form>
									</div>                                  
								</section>
                            </div>
                        </div>						
</section>

</div>
<!-- end: page -->


