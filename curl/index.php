<?php

require_once 'functions/users.php';
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users JSONPlaceholder</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <form action=""></form>

    <div class="flex gap-2 flex-wrap">
        <?php foreach ($users as $user) { ?>
        <div class="border-2 p-2">
            <?php echo $user['name']; ?>
        </div>
        <?php } ?>
    </div>
</body>

</html>