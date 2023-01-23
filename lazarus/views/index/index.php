<?php include_once '../inc/templates/main_templates/main_header.php'; ?>

<?php include_once '../inc/templates/main_templates/navbar.php'; ?>


<div class="content">

  <?php

  #echo '<p>' . $_SESSION['usr_id'] . '</p>' . "<br>";
  #echo '<p>' . $_SESSION['usr_email'] . '</p>' . "<br>";
  #echo '<p>' . $_SESSION['usr_alias'] . '</p>' . "<br>";
  #echo '<p>' . $_SESSION['usr_fullName'] . '</p>' . "<br>";
  #echo '<p>' . $_SESSION['usr_profilePic'] . '</p>' . "<br>";
  #echo '<p>' . $_SESSION['usr_createdAt'] . '</p>' . "<br>";

  ?>

  <?php

    if(isset($_SESSION['img_msg_error'])){
      echo '<p>' . $_SESSION['img_msg_error'] . '</p>';
      unset($_SESSION['img_msg_error']);
    }

    if(isset($_SESSION['text_msg_error'])){
      echo '<p>' . $_SESSION['text_msg_error'] . '</p>';
      unset($_SESSION['text_msg_error']);
    }

    if(isset($_SESSION['msg_success'])){
      echo '<p>' . $_SESSION['msg_success'] . '</p>';
      unset($_SESSION['msg_success']);
    }
    
  ?>

  <form method="POST" id="messageForm" action="MessagesController.php" enctype="multipart/form-data" class="form">
    <input type="hidden" name="action" value="post_message">
    <div class="column">
      <div class="input-box">
        <label>Mensaje de texto</label>
        <input type="text" name="fTexto" id="fTexto" placeholder="Introduzca un mensaje" required />
        <span class="material-symbols-outlined">
          account_circle
        </span>
      </div>
    </div>


    <div class="column">
      <div class="input-box">
        <label>Foto mensaje </label>
        <input type="file" name="fImagen" id="fImagen" />
      </div>
    </div>
    <button type="submit">SUBIR MENSAJE</button>
  </form>


</div>


<?php include_once '../inc/templates/main_templates/main_footer.php'; ?>