<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    //От кого письмо
    $mail->setFrom('info@fls.com', 'Сайт Promo');
    //Кому
    $mail->addAddress('skopthe6@gmail.com');
    //Тема
    $mail->Subject = "Уведомление от сайта promo"

    //Тело письма
    $body = '<h1>Пользователь заполнил форму для получения бесплатной консультации</h1>'

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name']'</p>';
    }

    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['phone']'</p>';
    }

    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-Mail:</strong> '.$_POST['email']'</p>';
    }

    if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Cообщение:</strong> '.$_POST['message']'</p>';
    }

    $mail->Body = $body;

    //отправка
    if (!mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>