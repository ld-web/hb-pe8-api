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

<body class="bg-gray-900 text-gray-200">
    <h1 class="mt-16 text-center text-5xl">Users JSONPlaceholder</h1>
    <div class="flex gap-4 flex-wrap justify-center mx-auto mt-8 mb-12">
        <?php foreach ($users as $user) { ?>
        <div class="border-[1px] p-2 rounded-md w-[300px]">
            <h2 class="text-center text-2xl">
                <?php echo $user['name']; ?>
            </h2>
            <div class="mt-4">
                <p class="flex gap-2">
                    <img src="icons/email.svg" alt="Email" class="w-[20px]" />
                    <?php echo $user['email']; ?>
                </p>
                <p class="flex gap-2">
                    <img src="icons/phone.svg" alt="Phone" class="w-[20px]" />
                    <?php echo $user['phone']; ?>
                </p>
                <p class="flex gap-2">
                    <img src="icons/website.svg" alt="Website" class="w-[20px]" />
                    <?php echo $user['website']; ?>
                </p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>