$("#combo").on('change', function() {
	$.ajax({
		type: 'POST',
		url: 'process.php',
		data: { univ_id: this.value },
		success: function(data) {
			$("#aDiv").html(data);
		}
	})
});