
<?php require_once("config.php")  ?>
<!DOCTYPE html>
<html>
<head>
    <title> Upload de arquivos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  

    <style>

        

        button{
            text-align: center;
        }

        body{
            background-color: black;

        }
        .Pdiv{
            
            position: center;   
            text-align: center;
            padding: 10px 10px 10px 10px;
            background-color: #dddf;
       
        }
        input {
	    width:150px;
        }

        .imagens{
            display:flex;
            flex-wrap:wrap;
            justify-content:center;

        }

        img{
            width: 400px;
            height: 300px;
            display: flex;
            border-radius: 5px;
            padding: 0.5px;
            
        }

        img:hover, img:active{
            background-color: green;
     
        }

        input[type='file']{
            opacity:0;
            display:none;
        }
        label{
            display:inline-block;
            -moz-appearance:none;
            -webkit-appearance: none;
            outline:none;
            position:relative;
            color:#fff;
            background-color:#fff;
            height:34px;
            width:150px;
            border-radius:8px;
            cursor:pointer;
            transition: .4s;
        }

        label:hover::after{
            
            background-color: #cc0000;
            transition: .4s;

        }
        label::after{
            position:absolute;
            border-radius:8px;
            content: 'Arquivo';
            line-height:34px;
            text-align:center;
            font-weight:400;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:red;
            z-index:2;
        }

      

        input[type=file]::-moz-file-upload-button{
            background-color:blue
        }

        .f{
            width:100px;
        }

    </style>
</head>
<body>
<form method="POST"  enctype= 'multipart/form-data' action='upload.php'>
    <div class='Pdiv'> 
        
    <label for='arquivo'></label>
    <input type="file" id="arquivo" name='arquivo'/>
        <button class='btn btn-success btn-sm' type='submit' >Enviar</button>
    </div>
    <hr>
</form>


    <?php

    if(isset($_GET['msg'])){
        $msg = base64_decode($_GET['msg']);
        print "<div class='alert alert-warning'>{$msg}</div>";
    }
        $pasta = "arquivos/";
       
        $d = dir($pasta);
        $d -> read();
        $d -> read();
        print "<div class='imagens'>";
        while($arquivo = $d -> read()){

            print "<a href='remover.php?arquivo={$arquivo}'><img src='{$pasta}{$arquivo}'/></a>";

        }
        print "</div>";
        $d -> close();
    ?>
    


</body>
</html>


