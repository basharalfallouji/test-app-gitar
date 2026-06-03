<?php
function parseRequest($file) { 
  if ($file !== null) { 
      include($file);
  }
}

$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;
parseRequest($file);
