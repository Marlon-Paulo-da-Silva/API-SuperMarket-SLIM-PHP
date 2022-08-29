<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- AnimateCSS -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/assets/styles/global.css"> <!-- Referência do CSS Global -->

    <!--<link rel="stylesheet" href="./assets/styles/global.css">  Referência do CSS Global -->
    <script src="https://unpkg.com/feather-icons"></script> <!-- Biblioteca do Feather Icons -->
</head>

<body>
    <main class="container">
        <?= $this->section('content'); ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</body>

</html>