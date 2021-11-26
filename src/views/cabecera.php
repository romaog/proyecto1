<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perrera  Talavera</title>
    <link rel="stylesheet" href="<?= Config::URL_BASE . "/estilos2.css" ?>">
</head>

<body>
    <div class="main-container">
        <header class="cabecera">
            <div>
                <h1 class="cabecera_titulo">Adopta un perrete</h1>
            </div>
            <div class="cabecera_right">
                <p class="cabecera_usuario"><?= $_SESSION["nombre"] ?? '' ?></p>
                <a class="cabecera_link <?= isset($_SESSION["autenticado"]) ? 'ocultar' : '' ?>" href="<?= Config::URL_BASE . '/login' ?>">Login</a>
                <a class="cabecera_link <?= isset($_SESSION["autenticado"]) ? 'ocultar' : '' ?>" href="<?= Config::URL_BASE . '/registro' ?>">Registro</a>
                <a class="cabecera_link <?= isset($_SESSION["autenticado"]) ? '' : 'ocultar' ?>" href="<?= Config::URL_BASE . '/login/cerrar' ?>">Salir</a>
            </div>
        </header>
        <nav class="nav">
            <ul class="nav_list">
                <li class="nav_item"><a class="nav_link" href="<?= Config::URL_BASE . "/perros"?>">Perros</a></li>
                
            </ul>
        </nav>