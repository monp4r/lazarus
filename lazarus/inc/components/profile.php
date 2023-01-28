<?php



function mostrarPerfil($profilePic, $alias, $fullName, $following){

  include_once '../models/User.php';
  $im = new User();
  
  echo "<div class=\"dropdown\">
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
                          SEGUIDORES: ". $im->ObtenerSeguidoresUsuario($alias) ."
                          <br/>
                          SIGUIENDO: ". $im->ObtenerSeguidosUsuario($alias) ."
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
}

?>