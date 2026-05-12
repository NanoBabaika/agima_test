<?

// функции проверки переданных данных.
function validateForm($username, $email, $rating, $comment) {
    $errors = [];    

    // Имя
    if (empty($username)) {
        $errors[] = 'Поле имя не может быть пустым';
    } elseif (mb_strlen($username) < 3) {
        $errors[] = 'Длинна имени должен быть не менее 3 символов';
    } elseif (mb_strlen($username) > 15) {
        $errors[] = 'Максимальная длинна имени не может быть более 15 символов';
    } 

    // Email
    if (empty($email)) {
        $errors[] = 'Email не может быть пустым';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Некорректный email';
    }
    
    // Рейтинг 
    if(!is_int($rating)) {
        $errors[] = 'Некорректные данные оценки';
    } elseif($rating > 5) {
        $errors[] = 'Максимальная оценка не может быть больше 5 балов';
    }

    // Комментарий
    if(mb_strlen($comment) > 200) {
        $errors[] = 'Превышена максимальная длинна комментария.';        
    }

    return $errors;
}

// функция сохранения данных в файл
function saveDataFromForm($username, $email, $rating, $comment) {
    
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/messages';
    $filename = $dir . '/log.txt';  

    // проверяем, есть ли папка, если нет — создаем её (права 0755)
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    // добавляем дату сохранения
    $date = date('Y-m-d H:i:s');
    
    // собираемм комментарий 
    $comment = str_replace(["\r", "\n"], ' ', $comment);
    

    // собираем строку для файла со всеми данными
    $line = "[{$date}] | Имя: {$username} | Email: {$email} | Рейтинг: {$rating} | Коммент: {$comment}" . PHP_EOL;

    //  сохраняем данные.
    $result = file_put_contents($filename, $line, FILE_APPEND);
    
    // возвращаем результат
    return $result;  

}
