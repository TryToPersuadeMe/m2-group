<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['name']) && (!empty($_POST['phone']) || !empty($_POST['email']))){
  	if (isset($_POST['name'])) {
  		if (!empty($_POST['name'])){
	      $name = strip_tags($_POST['name']) . "<br>";
	      $nameFieldset = "<b>Имя:</b> ";
	     }
    }
    if (isset($_POST['phone'])) {
    	if (!empty($_POST['phone'])){
	      $phone = strip_tags($_POST['phone']) . "<br>";
	      $phoneFieldset = "<b>Телефон:</b> ";
	    }
    }
    if (isset($_POST['email'])) {
    	if (!empty($_POST['email'])){
	      $email = strip_tags($_POST['email']) . "<br>";
	      $emailFieldset = "<b>Почта:</b> ";
	 	  }
    }
    if (isset($_POST['type'])) {
    	if (!empty($_POST['type'])){
	      $type = strip_tags($_POST['type']) . "<br>";
	      $typeFieldset = "<b>Заказ на:</b> ";
	    }
    }
    if (isset($_POST['result'])) {
	    if (!empty($_POST['result'])){
	      $result = strip_tags($_POST['result']);
	      $resultFieldset = "<b>На сумму:</b> ";
	      $resultFieldsetLast = " руб.";
	    }
    }

    $to = "m2comp@inbox.ru";
    $sendfrom = "form@m-2.group";
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $headers .= "Content-Transfer-Encoding: 8bit \r\n";
    $subject = "Новая заявка";
    $message = "$nameFieldset $name
                $emailFieldset $email
                $phoneFieldset $phone
                $typeFieldset $type
                $resultFieldset $result $resultFieldsetLast";

    $send = mail ($to, $subject, $message, $headers);
        if ($send == 'true') {
            echo '<p class="success">Совсем скоро с вами свяжутся.</p>';
        } else {
          echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
        }
  } else {
  	echo '<p class="fail">Ошибка. Вы заполнили не все обязательные поля!</p>';
  }
} else {
  header ("Location: /");
}