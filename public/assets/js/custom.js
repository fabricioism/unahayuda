$("#btn-guardar").click(function(){
	$("#spinner").show();
	setTimeout(function(){
  		$("#spinner").hide();
  		$("#alert").show();
	}, 700);
});
