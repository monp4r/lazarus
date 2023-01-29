<?php
function alertsuccess($mensaje){
  echo "<div class=\"alert alert-success shadow-lg\">
  <div>
    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"stroke-current flex-shrink-0 h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
    <span>$mensaje</span>
  </div>
</div>";
}

function alertError($mensaje){
  echo "<div class=\"alert alert-error shadow-lg\">
  <div>
    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"stroke-current flex-shrink-0 h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
    <span>$mensaje</span>
  </div>
</div>";
}

function alertInformacion($mensaje){
  echo "<div class=\"alert alert-info shadow-lg\">
  <div>
    <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" class=\"stroke-current flex-shrink-0 w-6 h-6\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\"></path></svg>
    <span>$mensaje jaksdhkas</span>
  </div>
</div>";
}
?>