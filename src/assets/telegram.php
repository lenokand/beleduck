<?php

/* https://api.telegram.org/bot1739680438:AAEf5dxoVWFGEqHeFcnykMb9QtCewWa9qSA/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее 
1739680438:AAEf5dxoVWFGEqHeFcnykMb9QtCewWa9qSA
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


// Второй сопособ
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $msgs = [];
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
//     $token = "1739680438:AAEf5dxoVWFGEqHeFcnykMb9QtCewWa9qSA";
//     $chat_id = "-595738034";
 
//     if (!empty($_POST['name']) && !empty($_POST['phone'])){
//         $bot_url = "https://api.telegram.org/bot{$token}/";
//         $urlForPhoto = $bot_url . "sendPhoto?chat_id=" . $chat_id;
 
//         // if(!empty($_FILES['file']['tmp_name'])) {
             
//         //     // Путь загрузки файлов
//         //     $path = $_SERVER['DOCUMENT_ROOT'] . '/telegramform/tmp/';
 
//         //     // Массив допустимых значений типа файла
//         //     $types = array('image/gif', 'image/png', 'image/jpeg');
 
//         //     // Максимальный размер файла
//         //     $size = 1024000;
 
//         //     // Проверяем тип файла
//         //      if (!in_array($_FILES['file']['type'], $types)) {
//         //          $msgs['err'] = 'Запрещённый тип файла.';
//         //         echo json_encode($msgs);
//         //         die();
//         //      }
              
//         //      // Проверяем размер файла
//         //      if ($_FILES['file']['size'] > $size) {
//         //          $msgs['err'] = 'Слишком большой размер файла.';
//         //         echo json_encode($msgs);
//         //         die('Слишком большой размер файла.');
//         //      }
              
//         //      // Загрузка файла и вывод сообщения
//         //      if (!@copy($_FILES['file']['tmp_name'], $path . $_FILES['file']['name'])) {
//         //          $msgs['err'] = 'Что-то пошло не так. Файл не отправлен!';
//         //          echo json_encode($msgs);
//         //      } else {
//         //         $filePath = $path . $_FILES['file']['name'];
//         //         $post_fields = array('chat_id' => $chat_id, 'photo' => new CURLFile(realpath($filePath)) );
//         //         $ch = curl_init();
//         //         curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type:multipart/form-data" ));
//         //         curl_setopt($ch, CURLOPT_URL, $urlForPhoto);
//         //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         //         curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
//         //         $output = curl_exec($ch);
//         //         unlink($filePath);
//         //      }
//         // }
 
//         if (isset($_POST['name'])) {
//           if (!empty($_POST['name'])){
//             $name = "Имя пославшего: " . strip_tags($_POST['name']) . "%0A";
//           }
//         }
 
//         if (isset($_POST['phone'])) {
//           if (!empty($_POST['phone'])){
//             $phone = "Телефон: " . "%2B" . strip_tags($_POST['phone']) . "%0A";
//           }
//         }
 
//         // if (isset($_POST['theme'])) {
//         //   if (!empty($_POST['theme'])){
//         //     $theme = "Тема: " .strip_tags($_POST['theme']);
//         //   }
//         }
//         // Формируем текст сообщения
//         $txt = $name . $phone;
 
//         $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
//         if ($output && $sendTextToTelegram) {
//             $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
//             echo json_encode($msgs);
//         } elseif ($sendTextToTelegram) {
//             $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
//             echo json_encode($msgs);
//           return true;
//         } else {
//             $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
//             echo json_encode($msgs);
//             die('Ошибка. Сообщение не отправлено!');
//         }
 
//     } else {
//         $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
//         echo json_encode($msgs);;
//     }
// } else {
//   header ("Location: /");
// }
?>