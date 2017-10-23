<?php
    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    try {
        $mail->SetLanguage('br'); // Traduzir para pt-BR

        $mail->isSMTP(); // Seta para usar SMTP
        $mail->SMTPAuth = true; // Libera a autenticação
        $mail->SMTPDebug = 2; // Debug

        $mail->SMTPSecure = 'tls'; // Acesso com TLS exigido pelo Gmail
        $mail->Host = 'smtp.gmail.com'; // SMTP Server
        $mail->Username = 'login@gmail.com'; // Usuário SMTP
        $mail->Password = 'senha'; // Senha do usuário
        $mail->Port = 587; // Porta do SMTP

        $mail->setFrom('email@gmail.com', 'Nome'); // Email e nome de quem enviara o e-mail
        $mail->addReplyTo('email@gmail.com', 'Nome'); // E-mail e nome de quem responderá o e-mail

        $mail->addAddress('destino@dominio.com.br', 'Nome do destino'); // Email e nome do destino
        //$mail->addCC('copia@dominio.com.br'); // Enviar cópiar do e-mail
        //$mail->addBCC('copiaoculta@dominio.com.br'); // Enviar uma cópia oculta

        //$mail->addAttachment('image.jpg', 'imagem.jpg'); // Anexa um arquivo

        $mail->isHTML(true); // Seta o envio em HTML
        $mail->CharSet = 'UTF-8'; // Charset da mensagem
        $mail->Subject = 'Título da mensagem'; // Título da mensagem
        $mail->Body = '<b>Olá mundo!</b>'; // Mensagem
        $mail->AltBody = 'Ative o HTML da sua conta.'; // Mensagem alternativa
        $enviar = $mail->send(); // Envia e-mail

        if($enviar):
            echo 'Mensagem enviada com sucesso!';
        else:
            echo 'Erro ao enviar mensagem!<br>';
            echo 'Erro: '.$mail->ErrorInfo;
        endif;
    }catch(Exception $e){
        echo 'Erro ao enviar mensagem!';
        echo 'Erro: '.$mail->ErrorInfo;
    }
