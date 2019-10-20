<?php require_once("config.php")  ?>
<?php

$destino = dirname(__FILE__)."/{$pasta}";

$file = $_FILES['arquivo'];
/**
switch($file['error']){
    case 0: print "nenhum erro"; break;
    case 1: print "Maior que o máximo permitido"; break;
    case 3: print "Envio parcial do arquivo"; break;
    case 4: print "Arquivo não enviado"; break;


}
*/

 
if($file['error']===0){
    if(($file['type']==="image/png" || $file['type']==="image/jpeg")){
        if(move_uploaded_file($file['tmp_name'],$destino.uniqid(TIME()).$file['name']))
            $msg = "Arquivo salvo!";
        else
            $msg = "Arquivo não salvo!";
    } else{
             $msg = "Formato não aceito!";
    }
}

header("location: index.php?msg=" . base64_encode($msg))
?>