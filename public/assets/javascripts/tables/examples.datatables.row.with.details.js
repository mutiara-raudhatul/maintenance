
(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-details');

		// format function for row details
		var fnFormatDetails = function( datatable, tr ) {
			var data = datatable.fnGetData( tr );

			return [
				// '<table class="table mb-none">',
				// 	'<tr class="b-top-none">',
				// 		'<td><label class="mb-none">Rendering engine:</label></td>',
				// 		'<td>' + data[1]+ ' ' + data[2] + '</td>',
				// 	'</tr>',
				// 	'<tr>',
				// 		'<td><label class="mb-none">Link to source:</label></td>',
				// 		'<td>Could provide a link here</td>',
				// 	'</tr>',
				// 	'<tr>',
				// 		'<td><label class="mb-none">Extra info:</label></td>',
				// 		'<td>And any further details here (images etc)</td>',
				// 	'</tr>',
				// '</div>'
			'<div class="col-md">',
			'</div>',
				'<table class="table table-bordered">',
					'<tr class="b-top-none">',
						
						// '<tr>',
						// 	'<th rowspan="2"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></th>',
						// 	'<th colspan="3">Model</th>',
						// 	'<th colspan="2">Jumlah</th>',
						// '</tr>',
						// '<tr>',
						// 	'<td colspan="3">HP Elitebook 830 G5 i7</td>',
						// 	'<td colspan="2">20</td>',
						// '</tr>',
						'<tr >',
							// '<th width="40px" border="0"></th>',
							'<th width="40px">No.</th>',
							'<th>Serial Number</th>',
							'<th>Asset Tag</th>',
							'<th>Hostname</th>',
							'<th class="center">Action</th>',
						'</tr>',
						'<tr>',
							'<td width="74px">1</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td class="center">',
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> |', 
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
							// '<td><i class="fa fa-pencil-square" style="color:orange" aria-hidden="true"></i> <i class="fa fa-trash-o" style="color:red" aria-hidden="true"></i></td>',
						'</tr>',
						'<tr>',
							'<td width="74px">2</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td class="center">',
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> |',
								// '<a href="/edit-barang" class="pull-right">Lost Password?</a>', 
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
							'</td>',
						'</tr>',
						'<tr>',
							'<td width="74px">3</td>',
							'<td>5CG912359N</td>',
							'<td>SIPDG201904-03-NB-00001</td>',
							'<td>SP3467NB</td>',
							'<td class="center">',
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Edit</button> |', 
								'<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Delete</button>',
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