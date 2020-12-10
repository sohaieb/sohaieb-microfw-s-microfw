<?php

$files = scandir('../routes');

foreach ($files as $file){
  if($file!=='run-routes.php' && strpos($file,'.php')!==false){
    require_once "../routes/{$file}";
  }
}
