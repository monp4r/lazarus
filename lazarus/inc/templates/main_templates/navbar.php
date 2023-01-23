<script type="text/javascript" src="../public/js/user_search.js"></script>
<link rel="stylesheet" type="text/css" href="../public/css/navbar_style.css" media="screen" />
<nav x-data="{ open: false }">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

        <!-- Botón Hamburguesa para versiones móviles -->
        <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="menu-disp-movil" @click="open = !open" >

          <!-- Icono de la hamburguesa para abrir -->
          <svg class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5">
            </path>
          </svg>

          <!-- Icono de la hamburguesa para cerrar -->
          <svg class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>

        </button>
      </div>

      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

        <div class="flex flex-shrink-0 items-center">
          <img class="block h-8 w-auto lg:hidden" src="../public/img/lazarus_logo.svg" alt="Lazarus" />
          <img class="hidden h-8 w-auto lg:block" src="../public/img/lazarus_logo.svg" alt="Lazarus" />
        </div>

        <!-- Barra de navegación para versión de escritorio -->
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">

            <a href="IndexController.php?action=index" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" >Inicio</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" >Seguidos</a>


            <!-- Input de busqueda -->
            <div class="pt-2 relative mx-auto text-gray-600 input-busqueda">
              <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm
              live_search" type="text" name="live_search" autocomplete="off" placeholder="Buscar Usuarios ...">

              <div class="searchresult" ></div>

            </div>

          </div>
        </div>
      </div>

      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

        <!-- Desplegable del Perfil del Usuario -->
        <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative ml-3">
          <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="desplegable-usuario" x-ref="button" @click="onButtonClick()">
              <img class="h-8 w-8 rounded-full" style="width:35px;" src="<?php echo $_SESSION['usr_profilePic']; ?>" alt="<?php echo $_SESSION['usr_fullName']; ?>" />
            </button>
          </div>

          <div x-show="open" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" style="display: none">

            <a href="UsersController.php?action=profile" class="block px-4 py-2 text-sm text-gray-700">Tu Perfil</a>
            <a href="UsersController.php?action=edit_profile" class="block px-4 py-2 text-sm text-gray-700">Gestionar Perfil</a>
            <a href="UsersController.php?action=logout" class="block px-4 py-2 text-sm text-gray-700">Cerrar Sesión</a>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Barra de navegación para versión móvil -->
  <div class="sm:hidden" id="menu-disp-movil" x-show="open" style="display: none">
    <div class="space-y-1 px-2 pt-2 pb-3">

      <a href="IndexController.php?action=index" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Inicio</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Seguidos</a>

      <!-- Input de busqueda -->
      <div class="pt-2 relative mx-auto text-gray-600 input-busqueda" style="left: 10px;">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm
              live_search" type="text" name="live_search" autocomplete="off" placeholder="Buscar Usuarios ...">
        <div class="searchresult"></div>
      </div>

    </div>
  </div>  
</nav>