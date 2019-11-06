<?PHP
require 'funciones_paparazzi.php';


if (file_exists('photo.txt')) 

{



 header("Content-type: image/gif");
 $json = file_get_contents('photo.txt');
$obj = json_decode($json);
 echo base64_decode( $obj->{'encodedImage'} );
}
else
{
 echo 'No se cargo ninguna fotografia';
}
?>