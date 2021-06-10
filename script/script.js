function pedir(){
    var url = document.getElementById('direccion').value;
    if(validarErrores() == false){
        $.ajax({
            type: "POST",
            url: 'Peticion.php',
            data: {direccion:url},
            success: function(data){
                procesar(data,url);
                console.log(data);
            },
            error: function(xhr, status, error){
                alert(xhr);
            }
        });
        var datos = new XMLHttpRequest();
        datos.open('POST', 'Azure.php', true);
        datos.send();
    }
}
function procesar(data, url){
    var procesado = document.getElementById('procesado');
    var edadMin = document.getElementById('edadMin').value;
    var edadMax = document.getElementById('edadMax').value;
    var sexos = [];
    if(document.getElementById('Hombre').checked){
        sexos.push(document.getElementById('Hombre').value);
    }
    if(document.getElementById('Mujer').checked){
        sexos.push(document.getElementById('Mujer').value);
    }
    var faces_info = JSON.parse(data);
    var canva = document.getElementById('myCanvas');
    var ctx = canva.getContext("2d");
    ctx.clearRect(0, 0, canva.width, canva.height)
    var background = new Image();
    background.src = url;
    background.width = 1000;
    background.height = 1000;
    background.onload = function(){
       ctx.drawImage(background,0,0);   
       var array = faces_info.faces;
       array.forEach(e=>{
           //Cargamos los cuadros sobre las caras
           if(edadMin<= e.age && e.age <= edadMax){
               if(sexos.includes(e.gender)){
                ctx.font = "10 Arial";
                ctx.fillStyle = "yellow";
                ctx.fillText("Gender: "+ e.gender + "  Age: " + e.age, e.faceRectangle.left - 10, e.faceRectangle.top - 5);
                ctx.beginPath();
                ctx.rect(e.faceRectangle.left, e.faceRectangle.top, e.faceRectangle.width, e.faceRectangle.height);
                ctx.strokeStyle = "yellow";
                ctx.lineWidth = 5;
                ctx.stroke();
               }
           }
       })
    }
}
function checkURL(url) {
    return(url.match(/\.(jpeg|jpg|gif|png)\?.*$/) != null);
}
function validarErrores(){
    var edadMin = document.getElementById('edadMin').value;
    var edadMax = document.getElementById('edadMax').value;
    var Male = document.getElementById('Hombre');
    var Female = document.getElementById('Mujer');
    var url = document.getElementById('direccion').value;
    if(edadMax < edadMin){
        alert('Rango de edades no válido');
        return true;
    } else if(url.length == 0){
        alert("No ha indicado una direccion");
        return true;
    }else if(checkURL(url) == false){
        alert("La direccion indicada no es la de una imagen");
        return true;
    } else if(edadMax.length == 0 || edadMin.length == 0){
        alert("Rangos de edad vacios");
        return true;
    } else if(Male.checked == false && Female.checked == false){
        alert("No ha especificado el sexo");
        return true;
    }
    else{
        return false;
    }
}