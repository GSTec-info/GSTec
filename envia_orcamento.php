<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
    <title>Enviando Orçamento...</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            text-decoration: none;
        }
        
        #div_enviando {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            text-align: center;
            align-items: center;
            padding-top: 200px;
        }
        
        div>h1 {
            font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: #004e8a;
        }
        
        #img {
            width: 400px;
            height: 150px;
            padding: 35px 0px 35px 0px;
            background-image: url("image/mail-send.gif");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div id="div_enviando">
        <h1 id="enviando">Enviando...</h1>
        <div id="img"></div>
    </div>

</body>

</html>
<?php

    //Variáveis
    $nome = $_POST['cNome'];
    $endereco = $_POST['cEndereco'];
    $telefone = $_POST['cTelefone'];
    $email = $_POST['cEmail'];
    $checkNotebook = $_POST['ckNotebook'];
    $checkDesktop = $_POST['ckDesktop'];
    $modelo = $_POST['cModelo_equip'];
    $descricaoProblem = $_POST['cDescricao'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s', strtotime('-3 hours'));

    //Compo E-mail
    $arquivo = "
        <html>
        
            <h1>Solicitação de Orçamento</h1>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Endereço:</strong> $endereco</p>
            <p><strong>Telefone:</strong> $telefone</p>
            <p><strong>E-mail:</strong> $email</p>
            <p><strong>Tipo de equipamento:</strong></p>
            <p>$checkNotebook $checkDesktop</p>
            <p><strong>Modelo do Equipamento:</strong> $modelo</p>
            <p><strong>Descrição do problema:</strong> $descricaoProblem</p>
            <br>
            <p>Este e-mail foi enviado em <strong>$data_envio</strong> às <strong>$hora_envio</strong></p>
        
        </html>
    ";
    
    //Emails para quem será enviado o formulário
    //$destino = "webmaster@gstec.app.br";
    //$destino = "generson.avelinosilva@gmail.com";
    $destino = "webmaster@gstec.app.br";
    $assunto = "Solicitação de Orçamento -- $nome";

    //Este sempre deverá existir para garantir a exibição correta dos caracteres
    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "Date: $data_envio\n";
    $headers .= "From: $nome <$email>";
    

    //Enviar
    mail($destino, $assunto, $arquivo, $headers);    

    echo "<meta http-equiv='refresh' content='10;URL=orcamento.html'>";
?>