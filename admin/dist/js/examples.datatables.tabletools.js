/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	2.2.0
*/

(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#filterTable');

		var table = $table.dataTable({
			sDom: '<"float-right"T><"col-lg-4"f><"table-responsive"t><"table-responsive"ip>',
			buttons: [ 'pageLength','print', 'excel', 'pdf' ],
			paging: true
		}); 
		$('.pull-right').addClass(' form-control-sm').prependTo('#filterTable_filter');
		$('<div />').addClass('dt-buttons mb-2 pb-1 float-right').prependTo('#filterTable_wrapper');
		$table.DataTable().buttons().container().prependTo( '#filterTable_wrapper .dt-buttons' );
		 $('#filterTable_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-info btn-sm');
	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);
