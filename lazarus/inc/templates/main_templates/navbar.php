<script type="text/javascript" src="../public/js/user_search.js"></script>
<link rel="stylesheet" type="text/css" href="../public/css/navbar_style.css" media="screen" />
<nav class="navbar">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 bg-[#111820]">
        <li><a href="IndexController.php?action=index">Inicio</a></li>
        <li><a href="#">Seguidos</a></li>
      </ul>
    </div>
    <div class="avatar"></div>
    <a class="btn btn-ghost normal-case text-xl ">
      
      <div class="w-8 ml-3 -ml-1">
        <img src="../public/img/lazarus_logo.svg" />
      </div>
    </a>
  </div>
  <div class="navbar-center hidden lg:flex bg-[#111820]">
    <ul class="menu menu-horizontal px-1 bg-[#111820]">
      <li class="bg-[#111820]"><a href="IndexController.php?action=index">Inicio</a></li>
      <li class="bg-[#111820]"><a href="#">Seguidos</a></li>
    </ul>
  </div>


  <div class="flex-none gap-2 navbar-end">
    <!-- Búsqueda de usuarios -->
    <div class="form-control bg-[#111820]">
      <div class="dropdown dropdown-bottom" >
        <label tabindex="0" class="m-1 mb-50 bg-[#111820]">
          <input type="text" placeholder="Buscar Usuarios" class="input input-bordered live_search bg-[#111820]" style="position: relative;" name="live_search" autocomplete="off"
          style="background-color:#111820;"
          /></label>
        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 bg-[#111820]">
          <div class="searchresult"></div>
        </ul>
      </div>
    </div>
    <div class="dropdown dropdown-end ">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar bg-[#111820]">
        <div class="w-10 rounded-full">
          <img src="<?php echo $_SESSION['usr_profilePic']; ?>" alt="<?php echo $_SESSION['usr_alias']; ?>" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52 bg-[#111820]">
        <li>
          <a class="justify-between" href="UsersController.php?action=profile&fAlias=<?php echo $_SESSION['usr_alias'] ?>" > Tu perfil </a>
        </li>
        <li><a href="UsersController.php?action=edit_profile">Gestionar Perfil</a></li>
        <li><a href="UsersController.php?action=logout">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>