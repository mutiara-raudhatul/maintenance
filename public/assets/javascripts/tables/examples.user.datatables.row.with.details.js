
(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-details-user');

		// format function for row details
		var fnFormatDetails = function( datatable, tr ) {
			var data = datatable.fnGetData( tr );

			return [
				'<php? foreach ($dtUsers as $item) ?>',
				'<table class="table mb-none">',
					'<tr class="b-top-none">',
						'<td><label class="mb-none">Nama(NIP)</label></td>',
						'<td>' + '  : ' + data[2]+ '  (' + data[2] +  ')' + '</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">Email</label></td>',
						'<td>: {!!json_encode($arrUse)!!} </td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">Password</label></td>',
						// '<td>' + '  :' + '</td>',
						'<td>: 12345</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">Eselon</label></td>',
						'<td>: 1</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">Phone</label></td>',
						'<td>: 0811-6616-969</td>',
					'</tr>',
				'</table>',
				'<?php @endforeach ?>'

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