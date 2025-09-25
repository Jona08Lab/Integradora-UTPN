<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="/INTEGRADORA-UTPN/assets/css/navbar.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/UTPN/index.php"><img src="/INTEGRADORA-UTPN/assets/img/Logo.png" alt="Logo UTPN"></a>
        </div>
        <div class="navbar-title">
            <h1>Bienvenidos a la UTPN</h1>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <span class="user-name">👤 <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
            <?php endif; ?>
        </div>
        <div class="navbar-login">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="/UTPN/logout.php" class="btn-login">Cerrar sesión</a>
            <?php else: ?>
                <a href="/UTPN/login_register.php" class="btn-login">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
