function pedir() {
    var url = document.getElementById('direccion').value;
    if (!validarErrores()) {
        /*
        $.ajax({
            type: "POST",
            url: 'Peticion.php',
            data: { direccion: url },
            success: function (data) {
                procesar(data,url);
            },
            error: function (xhr, status, error) {
                alert(xhr);
            }
        });
        */
        $.ajax({
            url: 'https://eastus.api.cognitive.microsoft.com/vision/v3.2/analyze?visualFeatures=Faces&language=en&model-version=latest',
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader(
                    "Ocp-Apim-Subscription-Key", '7b89298d4ae74ee992210d545dab4a63');
            },
            type: "POST",
            data: '{"url": ' + '"' + url + '"}',
        })
        .done(function(data) {
            var data = JSON.stringify(data, null, 2);
            procesar(data,url);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            errores(errorThrown);
        });
    }
}
function procesar(data, url) {
    //Variables
    var edadMin = document.getElementById('edadMin').value;
    var edadMax = document.getElementById('edadMax').value;
    var sexos = [];
    var aplicarFiltros = false;
    if (document.getElementById('Hombre').checked) {
        sexos.push(document.getElementById('Hombre').value);
    }
    if (document.getElementById('Mujer').checked) {
        sexos.push(document.getElementById('Mujer').value);
    }
    if(document.getElementById('Aplicarfiltros').checked){
        aplicarFiltros = true;
    }
    //------------------------
    var faces_info = JSON.parse(data);
    if (faces_info.error) {
        errores("URL inválida, la dirección ingresada no es accesible");
    }else if(faces_info.faces.length == 0){
        errores("No se han encontrado rostros en la imagen");
    } else {
        //Espacio donde se ponen las imagenes
        var canva = document.getElementById('myCanvas');
        var ctx = canva.getContext("2d");
        ctx.clearRect(0, 0, canva.width, canva.height)
        var background = new Image();
        background.src = url;
        background.onload = function () {
            ctx.drawImage(background, 0, 0, 1000,1000);
            var resizeAncho = tamanno(background.naturalWidth);
            var resizeAlto = tamanno(background.naturalHeight);
            var array = faces_info.faces;
            array.forEach(e => {
                //Cargamos los cuadros sobre las caras
                if(aplicarFiltros){
                    if (edadMin <= e.age && e.age <= edadMax && sexos.includes(e.gender)) {
                        ctx.font = "10 Arial";
                        ctx.fillStyle = "yellow";
                        ctx.fillText("Gender: " + e.gender + "  Age: " + e.age,  e.faceRectangle.left*resizeAncho, e.faceRectangle.top*resizeAlto - 10);
                        ctx.beginPath();
                        ctx.rect(e.faceRectangle.left*resizeAncho, e.faceRectangle.top*resizeAlto, e.faceRectangle.width*resizeAncho, e.faceRectangle.height*resizeAlto);
                        ctx.strokeStyle = "yellow";
                        ctx.lineWidth = 5;
                        ctx.stroke();
                    }
                }else{
                    ctx.font = "10 Arial";
                    ctx.fillStyle = "yellow";
                    ctx.fillText("Gender: " + e.gender + "  Age: " + e.age,  e.faceRectangle.left*resizeAncho, e.faceRectangle.top*resizeAlto - 10);
                    ctx.beginPath();
                    ctx.rect(e.faceRectangle.left*resizeAncho, e.faceRectangle.top*resizeAlto, e.faceRectangle.width*resizeAncho, e.faceRectangle.height*resizeAlto);
                    ctx.strokeStyle = "yellow";
                    ctx.lineWidth = 5;
                    ctx.stroke();
                }
            })
        }
    }
}
function validarErrores() {
    var edadMin = document.getElementById('edadMin').value;
    var edadMax = document.getElementById('edadMax').value;
    var Male = document.getElementById('Hombre');
    var Female = document.getElementById('Mujer');
    var url = document.getElementById('direccion').value;
    if ((edadMax < edadMin) || (edadMax > 100) || (edadMin < 0) && document.getElementById('Aplicarfiltros').checked) {
        errores('Rango de edades no válido');
        return true;
    } else if (url.length == 0) {
        errores("No ha indicado una direccion para la imagen");
        return true;
    } else if ((edadMax.length == 0 || edadMin.length == 0) && document.getElementById('Aplicarfiltros').checked) {
        errores("Faltan rangos de edad");
        return true;
    } else if ((Male.checked == false && Female.checked == false) && document.getElementById('Aplicarfiltros').checked) {
        errores("No ha especificado el sexo");
        return true;
    }
    else {
        return false;
    }
}
function ocultarFiltros(){
    var espacios = document.getElementById('filtros');
    if(document.getElementById('Aplicarfiltros').checked){
        if (espacios.style.display === "none") {
            espacios.style.display = "block";
        }
    }else {
        espacios.style.display = "none";
    }
}
function errores(mensaje){
    var alerta = document.getElementById('alerta');
    alerta.innerHTML="";
    if (alerta.style.display === "none") {
        alerta.style.display = "block";
    }
    alerta.appendChild(document.createTextNode(mensaje));
    $('#alerta').delay(5000).hide(0); 
}
function tamanno(valor){
    return 1000/valor;
}
ocultarFiltros();
