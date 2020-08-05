
$(document).ready(function(){
	$('#cancel-button').click(function(){
		window.location = 'index.php';
	});
	
	$('#multi-delete').click(function(){
		$('#main-form').submit();
	});
	
	// Check all Check box
	$('#check-all').change(function(){
		var checkStatus = this.checked;
		$('#main-form').find(':checkbox').each(function(){
			this.checked = checkStatus;
		});
	});
	
	// Click a Messege => Messege hide
	$('.success, .notice, .error').click(function() {
		 $(this).toggle("slow");
	});

	// Show time, day
	// $( "#birthday" ).datepicker({
    // 	dateFormat: "dd/mm/yy",
    // 	defaultDate: "+3d",
    // 	changeYear: true,
    // 	changeMonth: true,
    // 	yearRange: "2005:2020"
    // });

});
