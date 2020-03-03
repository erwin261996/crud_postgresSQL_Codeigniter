$(document).ready(function() {
  inicio();
});

var inicio = function () {
	$("#frm_login").submit(function (event){
        event.preventDefault();
        var formData = new FormData(document.getElementById("frm_login"));
        $.ajax({
            url:$("#frm_login").attr("action"),
            type:$("#frm_login").attr("method"),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(info){
            	alert(info);
            	$('#frm_login')[0].reset();
            }
        });
    });
}