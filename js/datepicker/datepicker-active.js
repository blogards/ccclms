(function ($) {
 "use strict";
 
	// Datepickers
		$('#start').datepicker({
			yearRange: "1991:2020",
			dateFormat: 'yy-mm-dd',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			onSelect: function( selectedDate )
			{
				$('#finish').datepicker('option', 'minDate', selectedDate);
			}
		});
		$('#finish').datepicker({
			yearRange: "1991:2020",
			dateFormat: 'dd.mm.yy',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			onSelect: function( selectedDate )
			{
				$('#start').datepicker('option', 'maxDate', selectedDate);
			}
		});
		$( "#finish" ).datepicker({
			yearRange: "1991:2020",
			changeYear: true,
	
		  });
		  var changeYear = $( "#finish" ).datepicker( "option", "changeYear" );
 
		// Setter
		$( "#finish" ).datepicker( "option", "changeYear", true );

 
})(jQuery); 