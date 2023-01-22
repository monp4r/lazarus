<?php include_once '../inc/templates/main_templates/main_header.php'; ?>

<?php include_once '../inc/templates/main_templates/navbar.php'; ?>


<div class="content  ">

  <?php

  echo '<p>' . $_SESSION['usr_id'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_email'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_alias'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_fullName'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_profilePic'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_createdAt'] . '</p>' . "<br>";

  ?>


</div>






<?php include_once '../inc/templates/main_templates/main_footer.php'; ?>