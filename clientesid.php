<?php

    if(isset($_POST['submit']))
    {
/*     

        print_r('Nome:'. $_POST['nome']);
        print_r('<br>');
        print_r('Email: ' . $_POST['email']);
        print_r('<br>');
        print_r('Telefone: ' . $_POST['telefone']);
        print_r('<br>');
        print_r('Descrição: '. $_POST['descricao']);
        print_r('<br>');
        print_r('Endereço: ' . $_POST['endereco']);
        print_r('<br>');
        print_r('Referência: ' . $_POST['referencia']);
     */

include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $descricao =  $_POST['descricao'];
    $endereco =  $_POST['endereco'];
    $referencia = $_POST['referencia'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,descricao,endereco,referencia)
    VALUES ('$nome','$email','$telefone','$descricao','$endereco','$referencia')");
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20230425/pngtree-bread-in-an-old-bakery-image_2513673.jpg');
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid orange;
        }
        legend{
            border: 1px solid orange;
            padding: 10px;
            text-align: center;
            background-color: orange;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: orange;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(45deg, rgb(235, 142, 36), rgb(252, 249, 97));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(235, 142, 36), rgb(252, 249, 9));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="clientesid.php" method="POST">
            <fieldset>
                <legend><b>informações para entrega</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="descricao" id="descricao" class="inputUser" required>
                    <label for="descricao" class="labelInput">Descrição</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="referencia" id="referencia" class="inputUser" required>
                    <label for="referencia" class="labelInput">Referência</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
