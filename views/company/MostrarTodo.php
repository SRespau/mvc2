<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    
<?php

    CompanyController::showTodo();
    echo "<br><a href='/home/agenda'>Volver a agenda </a>";
?>    
<?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>