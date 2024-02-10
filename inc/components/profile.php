<?php



function mostrarPerfil($profilePic, $alias, $fullName){

  include_once '../models/User.php';
  $im = new User();
  
  echo "<div class=\"dropdown\" >
                  <div tabindex=\"0\">
                    <div class=\"w-full\">
                      <img src=\"$profilePic\" width=\"94\" height=\"94\" alt=\"$fullName\" class=\"mask mask-squircle\" />
                    </div>
                  </div>
                </div>
                <div>
                  <div class=\"dropdown w-full\">
                    <div tabindex=\"0\">
                      <div class=\"text-center\">
                        <div class=\"text-lg font-extrabold\">
                          $alias
                        </div>
                        <div class=\"text-lg font-lg\">
                          $fullName
                        </div>
                        <div class=\"text-info-content/90 font-bold my-3 text-sm\">
                          SEGUIDORES: ". $im->obtenerSeguidoresUsuario($alias) ."
                          <br>
                          SIGUIENDO: ". $im->obtenerSeguidosUsuario($alias) ."
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
}

function mostrarBotonSeguido(){
  echo "<button class=\"btn\">SIGUIENDO</button>";
}

function mostrarBotonSeguir($usuario){
  echo "<div>  
          <form method=\"POST\" id=\"followForm\" action=\"FollowController.php\" enctype=\"multipart/form-data\" class=\"form\">
            <input type=\"hidden\" name=\"action\" value=\"follow_user\">
            <button class=\"btn\" ype=\"submit\" name=\"fUsuarioASeguir\" id=\"fUsuarioASeguir\" value=\"$usuario\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">
              SEGUIR
            </button>
          </form>
        </div>";
}

function mostrarBotonEditarPerfil(){
  echo "<button class=\"btn\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">
          Editar perfil
        </button>";
}

?>