//LOADER 
/*
$(window).on('load', function () {
    if ($(".pre-loader").length > 0){
        $(".pre-loader").fadeOut("slow");
        $(".loader-container").fadeOut("slow");
        $("body").fadeIn("slow");
    }
});
*/

// VALIDACION DE IMAGENES (TAMAÑO Y TIPO)
$('#post_attachment').on('change load', function() {
    var fileType = $('#post_attachment')[0].files[0].type;
    console.log(fileType);
    if (fileType == "image/jpeg" || fileType == "image/png") {
        var fileSize = $('#post_attachment')[0].files[0].size;
        var sizekiloByte = parseInt(fileSize / 1024);
        if (sizekiloByte > 2000) {
            alert("Imagen muy grande y demorará en subir");
        } else if (sizekiloByte > 5000) {
            alert("Imagen demasiado grande");
            $('#post_attachment').val("");
        }
    } else {
        alert("El archivo no es una imagen");
        $('#post_attachment').val("");
    }
});

$('#search_button').hover(function() {
    $('#search_button').css('cursor', 'pointer');
});

// RECARGA AUTOMATICA
setInterval(function() { window.location.reload(); }, 1800000);
console.log("https://vetstore.com.co");