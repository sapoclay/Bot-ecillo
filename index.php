<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Chatbot entreunosyceros</title>
  <link rel="icon" type="image/jpg" href="./img/favicon.ico" />
  <link rel="stylesheet" href="./css/style.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!--Script para mostra y ocultar el buscador-->
  <script>
    $(function() {
      $('#show').click(function() {
        $('#opciones').show();
      });
      $('#hide').click(function() {
        $('#opciones').hide();
      });
    })
  </script>
</head>

<body>

  <div class="wrapper">

    <div class="title">Bot-Ecillo</div>
    <div class="formulario">
      <!--Buscador-->
      <form method="get" action="https://www.google.com/search" target="_blank">
        <fieldset>
          <input class="entrada" type="search" name="q" placeholder="Término a buscar" id="busqueda" value="" autofocus required>
          <input type="hidden" name="num" value="50">
          <button type="submit" class="btn btn-link botb" id="botonBusqueda" title="Buscar"><i class="fas fa-search"></i></button><br>
          <a href="#" id="show">Mostrar</a> /
          <a href="#" id="hide">Ocultar</a><br />

          <div id="opciones">
            <hr />
            <b>Tipos de archivos:</b><br>
            <select class="select" name="as_filetype">
              <option label="Todos" value="" selected="selected"></option>
              <option value="ppt">PowerPoint</option>
              <option value="xls">Excel</option>
              <option value="doc">Word</option>
              <option value="pdf">PDF</option>
            </select><br>
            <b>Sitios web:</b><br>
            <select class="select" name="as_sitesearch">
              <option label="Todos" value="" selected="selected"></option>
              <option value="entreunosyceros.net">Entreunosyceros</option>
              <option value="es.wikipedia.org/">Wikipedia</option>
              <option value="github.com">Github</option>
              <option value="youtube.com">Youtube</option>
            </select>
          </div>

        </fieldset>
      </form>
    </div>
    <form>
      <div class="form">
        <div class="bot-inbox inbox">
          <div class="icon">
            <img class="direct-chat-img" src="./img/logoLogin.png" alt="Imagen de mensaje"/>
          </div>
          <div class="msg-header">
            <p>Hola, ¿cómo puedo ayudarte hoy?</p>
          </div>
        </div>
      </div>
      <div class="typing-field">
        <div class="input-data">
          <input id="data" type="text" placeholder="Escribe aquí tu pregunta.." required value=""/>
          <button id="send-btn">Enviar</button>
        </div>
      </div>
    </form>
    
  </div>
  <span class="copyR"><a href="https://entreunosyceros.net/about" class="copyR" target="_blank" title="about entreunosyceros.net">entreunosyceros.net - 2023</a></span>
  <script>
    $(document).ready(function() {
      $("#send-btn").on("click", function() {
        $value = $("#data").val().toLowerCase();
        $blanco = "";
        let termino = "busca: ";

        let posicion = $value.indexOf(termino);

        if (posicion !== -1) {
            $value = $value.replace(termino, '');
            $("#data").val($blanco);
            $("#busqueda").val($value); /*Se escribe el valor a buscar*/ 
            $("#botonBusqueda").trigger("click"); /*Lanza la búsqueda*/ 
            $("#busqueda").val($blanco);
        } else {

          $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div><div class="icon"><i class="fas fa-user"></i></div></div>';
          $(".form").append($msg);
          $("#data").val('');

          // iniciar el código ajax
          $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
              $replay = '<div class="bot-inbox inbox"><div class="icon"><img class="direct-chat-img" src="./img/logoLogin.png" alt="Imagen de mensaje"/></div><div class="msg-header"><p>' + result + '</p></div></div>';
              $(".form").append($replay);
              // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
              $(".form").scrollTop($(".form")[0].scrollHeight);
            }
          });
        };
      });

    });
  </script>
  
</body>

</html>