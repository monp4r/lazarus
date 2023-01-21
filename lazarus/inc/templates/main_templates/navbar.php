<nav x-data="{ open: false }" style="background-color: #111820">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Menú Hamburguesa Lazarus - Visión dispositivos móviles -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
          aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
          x-bind:aria-expanded="open.toString()">
          <svg class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5">
            </path>
          </svg>
          <svg class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Menú Horizontal Lazarus - Visión Escritorio-->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="block h-8 w-auto " src="../public/img/lazarus_logo.svg" alt="Lazarus" />
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="#"
              class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              Inicio
            </a>
            <a href="#"
              class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              Seguidos
            </a>
          </div>
        </div>
      </div>

      <!-- Menú usuario -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div x-data="Components.menu({ open: false })" x-init="init()"
          @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative ml-3">

          <!-- Botón perfil usuario -->
          <div>
            <button type="button"
              class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
              id="user-menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()"
              @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true"
              x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()"
              @keydown.arrow-down.prevent="onArrowDown()">
              <img class="h-8 w-8 rounded-full" style="width:35px;" src="<?php echo $_SESSION['usr_profilePic']; ?>"
                alt="<?php echo $_SESSION['usr_fullName']; ?>" />
            </button>
          </div>

          <!-- Desplegable usuario - Menú Gestión Perfil  -->
          <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
            x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
            aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
            @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
            @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()"
            style="display: none">

            <a href="#" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active" x-state:off="Not Active"
              :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem" tabindex="-1" id="user-menu-item-0"
              @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 0)" @mouseleave="onMouseLeave($event)"
              @click="open = false; focusButton()">Tu Perfil
            </a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" :class="{ 'bg-gray-100': activeIndex === 1 }"
              role="menuitem" tabindex="-1" id="user-menu-item-1" @mouseenter="onMouseEnter($event)"
              @mousemove="onMouseMove($event, 1)" @mouseleave="onMouseLeave($event)"
              @click="open = false; focusButton()">Gestionar Perfil
            </a>
            <a href="UsersController.php?action=logout" class="block px-4 py-2 text-sm text-gray-700"
              :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1" id="user-menu-item-2"
              @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 2)" @mouseleave="onMouseLeave($event)"
              @click="open = false; focusButton()">
              Cerrar Sesión
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</nav>