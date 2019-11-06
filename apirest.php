<?php
   $data = file_get_contents("php://input");
   $datares = array( 'Result'=>"200" );
   saveJSON($data);
   print ( json_encode( $datares ) );

   function saveJSON($data)
   { 
      $file = 'photo.txt';
      $success = file_put_contents($file, $data);
   }
?>  
