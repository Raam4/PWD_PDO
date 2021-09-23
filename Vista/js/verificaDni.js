function doThis(dni){
    var param = {"dniDuenio" : dni};
    $.ajax({
        data: param,
        url: '../../utiles/verificaDni.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if(!response.noexiste){
                alert(response.existe);
                document.getElementById('submit').disabled=false;
                document.getElementById('carga').style.visibility = 'hidden';
            }else{
                alert(response.noexiste);
                document.getElementById('submit').disabled=true;
                document.getElementById('carga').style.visibility = 'visible';
            }
        }
    });
};
$(document).ready(function(){
    $("#dniDuenio").change(function(){
        document.getElementById('submit').disabled=true;
    });
});