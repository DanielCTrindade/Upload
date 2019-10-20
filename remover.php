
<?php require_once("config.php")  ?>
<?php

$pasta = "arquivos/";
$arquivo = $_GET['arquivo'];

if(@unlink($pasta.$arquivo)){
    $msg = "Arquivo removido com sucesso!";
    
  //  die("Arquivo removido com sucesso");
}else{
    $msg = "Erro ao remover arquivo!";
   // die(Erro ao remover arquivo"");
}

header("location: index.php?msg=" . base64_encode($msg));

?>