
(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-details-coba');

		// format function for row details
		var fnFormatDetails = function( datatable, tr ) {
			var data = datatable.fnGetData( tr );

			return [
				
			'<div class="col-md">',
			'</div>',
				'<table class="table table-bordered">',
					'<tr class="b-top-none">',
						
						'<tr >',
							'<th width="40px">No.</th>',
							'<th>Serial Number</th>',
							'<th>Asset Tag</th>',
							'<th>Hostname</th>',
							'<th>Status</th>',
							'<th class="center">Action</th>',
						'</tr>',

						// '<tr>',
						// 	'<td>' + $no++ + '</td>',
						// 	'<td>' + $id_serial_number+ '</td>',
						// 	'<td>' + $asset_tag+ '</td>',
						// 	'<td>' + $hostname+ '</td>',
						// 	'<td>' + $status_barang+ '</td>',
						// '</tr>',

					'@foreach($detail_barang as $detail)',
						'<tr>',
							'<td width="74px">{{$no++}}</td>',
							'<td>{{ $detail->id_serial_number }}</td>',
							'<td>{{ $detail->asset_tag }}</td>',
							'<td>{{ $detail->hostname }}</td>',
							'<td>{{ $detail->status_barang }}</td>',
							'<td class="center">',
								'<a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a>',
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button>', 
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
						'</tr>',
					'@endforeach',

					'</tr>',
					
			'</div>'
			

			].join('');
		};

		// insert the expand/collapse column
		var th = document.createElement( 'th' );
		var td = document.createElement( 'td' );
		td.innerHTML = '<i data-toggle class="fa fa-plus-square-o text-primary h5 m-none" style="cursor: pointer;"></i>';
		td.className = "text-center";

		$table
			.find( 'thead tr' ).each(function() {
				this.insertBefore( th, this.childNodes[0] );
			});

		$table
			.find( 'tbody tr' ).each(function() {
				this.insertBefore(  td.cloneNode( true ), this.childNodes[0] );
			});

		// initialize
		var datatable = $table.dataTable({
			aoColumnDefs: [{
				bSortable: false,
				aTargets: [ 0 ]
			}],
			aaSorting: [
				[1, 'asc']
			]
		});

		// add a listener
		$table.on('click', 'i[data-toggle]', function() {
			var $this = $(this),
				tr = $(this).closest( 'tr' ).get(0);

			if ( datatable.fnIsOpen(tr) ) {
				$this.removeClass( 'fa-minus-square-o' ).addClass( 'fa-plus-square-o' );
				datatable.fnClose( tr );
			} else {
				$this.removeClass( 'fa-plus-square-o' ).addClass( 'fa-minus-square-o' );
				datatable.fnOpen( tr, fnFormatDetails( datatable, tr), 'details' );
			}
		});
	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);