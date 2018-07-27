var htmlobjek;
		$(document).ready(function(){
  $("#mapel").change(function(){
  	var mapel = $("#mapel").val();
  	$.ajax({
  		url: "aksi.php",
  		data: "mapel="+mapel,
  		cache: false,
  		success: function(msg){
            $("#guru").html(msg);
        }
    });
  });
  });