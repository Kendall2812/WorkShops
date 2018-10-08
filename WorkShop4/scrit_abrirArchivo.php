<?php

if ($argc <= 1)
{
  echo "El primer parametro debe ser la ubicacion del archivo csv.\n";
  echo "El segundo parametro debe ser la ubicacion donde se creara el nuevo archivo junto con el nombre que le va a poner.\n";
  exit;
}

$filecsv = $argv[1]; /*Contine el archivo csv */
$filetxt = $argv[2]; /*Direcion del nuevo archivo que se va a crear */

$fila = 0;
if (($gestor = fopen($filecsv, "r")) !== FALSE) {
while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
    $numero = count($datos);
    $fila++;
    for ($c=0; $c < $numero; $c++) {
        $dato1 = $datos[$c++];
        $dato2 = $datos[$c++];
        $dato3 = $datos[$c++];
        $dato4 = $datos[$c++];
        echo $dato1 . " " . $dato2 . " " . $dato3 . " " . $dato4 . " " . "\n";

        $myfile = fopen($filetxt, "a");
        fwrite($myfile, $dato1 . " " . $dato2 . " " . $dato3 . " " . $dato4 . "\r\n");
 
    }
    fclose($myfile);
}
fclose($gestor);
}
?>