<?php

// массивы для ошибок и сообщения о успехе
$errors = [];
$success = [];

// подключение файла с функциями
require './func/functions.php';
  

if(isset($_POST['submit_form'])) {

    // получаем данные из формы
    $username = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $rating = $_POST['rating'] ?? 0;
    $rating = intval($rating);
    $comment = ($_POST['comment'] ?? '');
    
    // Валидация данных
    $errors = validateForm($username, $email, $rating, $comment);
    
     
    if(empty($errors)) {
        // если нет ошибок пытаемся сохранить данные
        $result = saveDataFromForm($username, $email, $rating, $comment);
        

        if ($result === false) {
            // покажем ошибку если не удалось сохранить данные
            $errors[] = "Ошибка записи! Проверь права доступа к папке messages.";
        } else {
            // если успех то покажем сообщения и очистим поля
            $success[] = "Спасибо за ваше сообщение!";
            $username = $email = $comment = '';
            $rating  = 0;
        }

    } 
    
}

// подключение шаблона с версткой
require './template/template.tpl';
