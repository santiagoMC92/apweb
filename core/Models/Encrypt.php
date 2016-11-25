<?php

function Encrypt($string) {
  $long = strlen($string);
  $str = '';
  
  return md5($string);
}

?>
