<?php
	ob_start();
    require_once '../../global.php';    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo PATH; ?>/app/assets/img/favicon.ico" type="image/vnd.microsoft.icon" />
    <title>iBoom - ¡No borres los anuncios!</title>
</head>
<style type="text/css">
/* Estilos CSS del activador de anuncios */
#g207{
position:fixed !important;
position:absolute; /* Tipo de posición */
top:0;
top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px");
left:0;
width:100%; /* Ancho */
height:100%; /* Alto */
background:url(https://www.iboom.online/app/client/img/0E9Qw4s.png) right center !important; /* Imagen del fondo */
opacity:0.9; /* Opacidad */
filter:alpha(opacity=90); /* Filtro de la opacidad */
display:block
}
#g207 p{
	z-index:1;
opacity:1; /* Opacidad */
filter:none;
font:bold 40px Ubuntu, Arial, sans-serif; /* Tipo de fuente */
text-align:center; /* Alineamiento del texto */
margin:10% 0; /* Margen del texto */
}
#g207 span {
    width: 100%;
    height: 100%;
    position: fixed;
    text-align: center;
    margin-top: 25px;
    margin: 0 auto;
    font-family: Ubuntu;
    font-size: 60px;
    font-weight: bold;
    background-image: url(https://www.iboom.online/app/client/img/logo.gif);
    background-repeat: no-repeat;
    background-position: top;
}
#g207 p a,#g207 p i{
	z-index:1;
font-size:18px; /* Tamaño de la fuente */
}
#g207 ~ *{
	z-index:1;
display:none
}
/* Fin de los estilos */		
</style>
<body>
<div id="g207">
    <span></span>
    <p><img src="https://www.iboom.online/app/client/img/frank-antiadblock.png" alt="¡No borres los anuncios!">
    <img src="https://www.iboom.online/app/client/img/alerta-antidelete.png" alt="¡No borres los anuncios!">
    <br>
    <img src="https://www.iboom.online/app/client/img/alerta-antidelete2.png" alt="¡No borres los anuncios!"></p>
</div>
</body>
</html>