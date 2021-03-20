<?php

/* https://api.telegram.org/bot1739680438:AAEf5dxoVWFGEqHeFcnykMb9QtCewWa9qSA/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее 
My unic group
t.me/my_unic_test_bot.
595738034*/



//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1739680438:AAEf5dxoVWFGEqHeFcnykMb9QtCewWa9qSA";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-595738034";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Телефон:' => $phone
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}
?>