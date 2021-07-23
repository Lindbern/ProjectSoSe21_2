<?php
if (isset($_GET["id"])) {

$files = glob("../ProjectSoSe21_2/speicherstände/ProjectSoSe21/".$_GET["id"]."/*"); // alle Files im Ordner wählen
foreach($files as $file){
  if(is_file($file)) {
    unlink($file); // alle Files löschen
  }
}    
    
unlink("../ProjectSoSe21_2/speicherstände/ProjectSoSe21/".$_GET["id"]);
}
require "controller.speicherstande_overview.php";