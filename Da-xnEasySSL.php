<?php

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else 
{
  $protocol = 'http://';
}

if ($protocol != "https://")
{
  if ($_SERVER["SCRIPT_NAME"] == "index.php")
  {
    $replacedUrl = str_replace("index.php", " ", $_SERVER["SCRIPT_NAME"]); 
    header("Location: https://{$_SERVER['HTTP_HOST']}{$replacedUrl}");
  } else if ($_SERVER["SCRIPT_NAME"] == "index.html")
  {
    $replacedUrl = str_replace("index.html", " ", $_SERVER["SCRIPT_NAME"]); 
    header("Location: https://{$_SERVER['HTTP_HOST']}{$replacedUrl}");
  } else
  {
    header("Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['SCRIPT_NAME']}");
  }
}

?>
