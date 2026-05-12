<div class="errors">
    <?php foreach ($errors as $error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endforeach; ?>
</div>


<div class="success">
    <?php foreach ($success as $smessage): ?>
        <div class="success"><?= htmlspecialchars($smessage) ?></div>
    <?php endforeach; ?>
</div>