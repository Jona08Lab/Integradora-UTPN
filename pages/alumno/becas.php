<?php include "../../includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Becas Universitarias | Impulsa tu camino</title>
    <link rel="stylesheet" href="/UTPN/assets/css/becas.css">
    <link rel="stylesheet" href="/UTPN/assets/css/header.css">
    <link rel="stylesheet" href="/UTPN/assets/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
     <!-- NAV -->
  <header class="nav">
    <div class="container nav__inner">
      <a class="brand" href="#">
        <span class="brand__dot"></span>
        UT<span class="brand__accent">PN</span>
      </a>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container grid grid-2">
      <div class="hero__copy">
        <div class="chip">Convocatorias abiertas</div>
        <h1>Consigue la <span class="grad">beca</span> y pide <span class="grad alt">información</span> que te abren puertas</h1>
        <p class="muted">Explora convocatorias que te ayudaran en tu carrera.</p>
        <div class="hero__badges">
          <span class="badge ok">+1,200 becas filtradas</span>
          <span class="badge">Mentores certificados</span>
          <span class="badge warn">Plazas limitadas</span>
        </div>
      </div>

      <div class="hero__visual">
        <div class="glass card--stack">
          <div class="card">
            <h3>Beca Excelencia STEM</h3>
            <p>Hasta 100% de matrícula. Requisitos claros y acompañamiento.</p>
            <div class="meta">
              <span>🇲🇽 México</span>
              <span>Licenciatura</span>
              <span>Fecha límite: 30 Sep</span>
            </div>
            <a class="btn ghost" href="#becas">Ver detalles</a>
          </div>
          <div class="card delay">
            <h3>Maestría en el extranjero</h3>
            <p>Guía de SOP/ensayo, CV académico y cartas de recomendación.</p>
            <div class="meta">
              <span>🌍 Internacional</span>
              <span>Posgrado</span>
              <span>Rolling</span>
            </div>
            <a class="btn ghost" href="#asesorias">Empezar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="hero__blur hero__blur--1"></div>
    <div class="hero__blur hero__blur--2"></div>
  </section>

  <!-- SECCIÓN: BECAS DESTACADAS -->
  <section id="becas" class="section">
    <div class="container">
      <div class="section__head">
        <h2>Becas destacadas</h2>
        <p class="muted">Curadas y verificadas por nuestro equipo.</p>
      </div>
    </div>
  </section>

  <!-- CHAT FLOTANTE -->
  <div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    <div class="chat">
      <div class="header">
        <span class="title">¿Qué tienes en mente?</span>
        <button>
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <ul class="messages">
        <li class="other">¡Hola! 👋</li>
        <li class="other">¿Necesitas ayuda para postular?</li>
        <li class="self">Sí, quiero más información</li>
      </ul>
      <div class="footer">
        <div class="text-box" contenteditable="true"></div>
        <button id="sendMessage">Enviar</button>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer__inner">
      <div class="brand brand--footer">
        <span class="brand__dot"></span> UT<span class="brand__accent">PN</span>
      </div>
      <p class="muted small">© 2025 utpn. Hecho con pasión para estudiantes.</p>
    </div>
  </footer>

  <!-- CHATBOT JS -->
  <script>
    $(function(){
      var element = $('.floating-chat');
      var myStorage = localStorage;

      if (!myStorage.getItem('chatID')) {
          myStorage.setItem('chatID', createUUID());
      }

      setTimeout(function() {
          element.addClass('enter');
      }, 1000);

      element.click(openElement);

      function openElement() {
          var messages = element.find('.messages');
          var textInput = element.find('.text-box');
          element.find('>i').hide();
          element.addClass('expand');
          element.find('.chat').addClass('enter');
          textInput.prop("disabled", false).focus();
          element.off('click', openElement);
          element.find('.header button').click(closeElement);
          element.find('#sendMessage').click(sendNewMessage);
          messages.scrollTop(messages.prop("scrollHeight"));
          textInput.keydown(onMetaAndEnter);
      }

      function closeElement() {
          element.find('.chat').removeClass('enter').hide();
          element.find('>i').show();
          element.removeClass('expand');
          element.find('.header button').off('click', closeElement);
          element.find('#sendMessage').off('click', sendNewMessage);
          element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
          setTimeout(function() {
              element.find('.chat').removeClass('enter').show()
              element.click(openElement);
          }, 500);
      }

      function createUUID() {
          var s = [];
          var hexDigits = "0123456789abcdef";
          for (var i = 0; i < 36; i++) {
              s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
          }
          s[14] = "4";
          s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1);
          s[8] = s[13] = s[18] = s[23] = "-";
          return s.join("");
      }

      function sendNewMessage() {
          var userInput = $('.text-box');
          var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');
          if (!newMessage) return;
          var messagesContainer = $('.messages');
          messagesContainer.append('<li class="self">' + newMessage + '</li>');
          userInput.html('');
          userInput.focus();
          messagesContainer.finish().animate({
              scrollTop: messagesContainer.prop("scrollHeight")
          }, 250);
      }

      function onMetaAndEnter(event) {
          if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
              sendNewMessage();
          }
      }
    });
  </script>
</body>
<?php include "../../includes/footer.php"; ?>
</html>