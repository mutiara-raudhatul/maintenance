
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
								<li class="nav">
									@if(auth()->user()->role == "admin_gudang")
										<a href="/dashboard-admingudang">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									@elseif(auth()->user()->role == "admin_teknisi")
										<a href="/dashboard-adminteknisi">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									@elseif(auth()->user()->role == "teknisi")
										<a href="/dashboard-adminteknisi">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									@elseif(auth()->user()->role == "karyawan")
										<a href="/dashboard-adminteknisi">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									@endif
								</li>
								@if(auth()->user()->role == "admin_gudang")
									<li class="nav-parent">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>User</span>		
										</a>											
										<ul class="nav nav-children">
											<li>
												<a href="/registrasi">Registrasi</a>
											</li>
											<li >
												<a href="/data-user">Data User</a>
											</li>
										</ul>
									</li>
								

									<li class="nav-parent">
										<a>
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Barang</span>		
										</a>	
										<ul class="nav nav-children">
											<li>
												<a href="/barang-masuk">Barang Masuk</a>
											</li>
											<li >
												<a href="/data-barang">Data Barang</a>
											</li>
										</ul>
									</li>
									@endif

									<li class="nav-parent">
										<a>
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>History</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="/history-admingudang">
												History Admin Gudang
												</a>
											</li>
											<li>
												<a href="/history-adminteknisi">
												History Admin Teknisi
												</a>
											</li>
											<li>
												<a href="/history-teknisi">
												History Teknisi
												</a>
											</li>
											<li>
												<a href="/history-karyawan">
												History Karyawan
												</a>
											</li>
										</ul>
									</li>
									@if(auth()->user()->role == "admin_teknisi")
									@else
									<li class="nav-parent">
										<a>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Permintaan Barang</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="/permintaan-barang">
												Form Permintaan Barang
												</a>
											</li>
											<li>
												<a href="/respon-permintaan-barang">
												Respon Permintaan Barang
												</a>
											</li>
											<li>
												<a href="/permintaan-barang">
												List Permintaan Barang
												</a>
											</li>
											<li>
												<a href="/tolak-permintaan-barang">
												Tolak Permintaan Barang
												</a>
											</li>
										</ul>
									</li>	
									@endif				

									@if(auth()->user()->role == "admin_gudang")
									@else
									<li class="nav-parent">
										<a>
											<i class="fa fa-wrench" aria-hidden="true"></i>
											<span>Maintenance</span>
										</a>
										<ul class="nav nav-children">
											@if(auth()->user()->role == "admin_teknisi")
											<li>
												<a href="/list-permintaan-maintenance">
												Permintaan Maintenance
												</a>
											</li>
											<li>
												<a href="/list-respon-maintenance">
												Respon Maintenance
												</a>
											</li>
											<li>
												<a href="/list-dokumen-maintenance">
												Dokumen Maintenance
												</a>
											</li>
											<li>
												<a href="/jenis-maintenance">
												Jenis Maintenance
												</a>
											</li>
											<li>
												<a href="/status">
												Status Maintenance
												</a>
											</li>
											<li>
												<a href="/history-adminteknisi">
												History
												</a>
											</li>
											@elseif(auth()->user()->role == "teknisi")
											<li>
												<a href="#">
												Permintaan Barang
												</a>
											</li>
											<li>
												<a href="/list-permintaan-maintenance-user">
												Permintaan Maintenance
												</a>
											</li>
											{{-- <li>
												<a href="/list-maintenance-teknisi">
												Respon Maintenance
												</a>
											</li> --}}
											<li>
												<a href="/list-maintenance-teknisi-respon">
												Hasil Maintenance Teknisi
												</a>
											</li>
											<li>
												<a href="/history-barang-teknisi">
												History Permintaan barang
												</a>
											</li>
											<li>
												<a href="/history-teknisi">
												History Permintaan Maintenance
												</a>
											</li>
											@elseif(auth()->user()->role == "karyawan")
											<li>
												<a href="#">
												Permintaan Barang
												</a>
											</li>
											<li>
												<a href="/list-permintaan-maintenance-user">
												Permintaan Maintenance
												</a>
											</li>
											<li>
												<a href="/history-barang-karyawan">
												History Permintaan barang
												</a>
											</li>
											<li>
												<a href="/history-karyawan">
												History Permintaan Maintenance
												</a>
											</li>
											@endif
										</ul>
									</li>
									@endif
								</ul>
							</nav>
				
							<hr class="separator" />
				
						
						</div>
				
					</div>
				
				</aside>
<!-- end: sidebar -->