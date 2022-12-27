<?php
echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';

echo '

<header class="header">
  <div class="child-header">
    <div class="box-logo">
      <a href="" class="link-logo">Bot-ecillo</a>
    </div>
    
    <nav class="box-menu-navegacion" id="menu-navegacion">
      <ul class="menu-navegacion">
        <li class="item-menu">
          <a href="index.php" target="_blank" class="item-menu-link"><i class="fas fa-robot"></i> Bot</a>
        </li>
        <li class="item-menu">
          <a href="answers.php" class="item-menu-link"><i class="fas fa-question"></i> Preguntas</a>
        </li>
        <li class="item-menu">
          <a href="questions.php" class="item-menu-link"><i class="fas fa-comment-dots"></i> Respuestas</a>
        </li>
        <li class="item-menu">
          <a href="admin.php" class="item-menu-link"><i class="fas fa-question-circle"></i> Sin respuesta</a>
        </li>
        <li class="item-menu">
          <a href="profile.php" class="item-menu-link"><i class="fas fa-user-circle"></i> Perfil</a>
        </li>
        <li class="item-menu"></li>
          <a href="logout.php" class="item-menu-link"><i class="fas fa-sign-out-alt"></i> Salir</a>
        </li>
    </nav>
  
    <button class="btn-hamburguesa" id="btn-hamburguesa">
      <span></span>
      <span></span>
      <span></span>
    </button>
  
  </div>
</header>

';
