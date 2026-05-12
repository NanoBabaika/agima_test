<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="form-container">
        <h1>Обратная связь</h1>
            
            <?php include './template/errors.tpl'; ?>
        
        <form method="post" action="./index.php">
            <div class="form-group">
                <label for="name">Имя (до 15 символов)</label>
                <input type="text"  name="name" maxlength="15" value="<?= isset($data['name']) ? htmlspecialchars($data['name']) : '' ?>" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  name="email" value="<?= isset($data['email']) ? htmlspecialchars($data['email']) : '' ?>" >
            </div>
            <div class="form-group">
                <label for="rating">Оценка страницы (0–5)</label>
                <input type="number"  name="rating" min="0" max="5" step="1" value="<?= isset($data['rating']) ? htmlspecialchars($data['rating']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий (до 200 символов)</label>
                <textarea  name="comment" maxlength="200" rows="4"><?= isset($data['comment']) ? htmlspecialchars($data['comment']) : '' ?></textarea>
            </div>
            <button name="submit_form" type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>