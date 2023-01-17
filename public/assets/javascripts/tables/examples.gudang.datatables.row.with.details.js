
(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-details-gudang');

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
						'<tr>',
							'<td width="74px">1</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td>TERSEDIA</td>',
							'<td class="center">',
								'<a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a>',
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button>', 
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
						'</tr>',
						'<tr>',
							'<td width="74px">2</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td>RUSAK</td>',
							'<td class="center">',
								'<a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a>', 
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
						'</tr>',
						'<tr>',
							'<td width="74px">3</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td>DIPAKAI</td>',
							'<td class="center">',
								'<a href="/edit-barang"> <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> </a>', 
								// '<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
						'</tr>',
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