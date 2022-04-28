(function ($) {
 "use strict";

	 $('#data_1 .input-group.date').datepicker({
 		startView: 2,
		todayBtn: "linked",
		keyboardNavigation: false,
		forceParse: false,
		calendarWeeks: true,
		autoclose: true,
		format: "yyyy/mm/dd",
    defaultDate: ""
	});

	$('#data_2 .input-group.date').datepicker({
		startView: 1,
		todayBtn: "linked",
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true,
		format: "dd/mm/yyyy"
	});

	$('#data_3 .input-group.date').datepicker({
		startView: 2,
		todayBtn: "linked",
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true
	});

	$('#data_4 .input-group.date').datepicker({
		minViewMode: 1,
		keyboardNavigation: false,
		forceParse: false,
		forceParse: false,
		autoclose: true,
		todayHighlight: true
	});

	$('#data_5 .input-daterange').datepicker({
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true
	});
	
	$( "" ).datepicker({ 
		startView: 2,
		todayBtn: "linked",
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true,
		minDate: 0, 
		maxDate: "+2D" 
	});

	$('').datepicker({
	todayBtn: "linked",
	dateFormat: "yy-mm-dd",
	maxDate:'+3d',
	minDate: 0
	
	});

	$('').datepicker({
		dateFormat: "yy-mm-dd",
		minDate: new Date('2022-04-25')
	   });
	  

})(jQuery);
