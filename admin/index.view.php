<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/header-admin.php';?>

<div class="container">
    <form action="auth-admin.php" method="POST">
        <h3>Minecraft-Chest Admin Panel</h3>
        <fieldset><input type="text" id="login" name="login" required><label for="login">Login</label></fieldset>
            <fieldset><input type="password" id="password" name="password" required><label for="password">Password</label></fieldset>
        <button type="submit">Войти</button>
    </form>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/footer-admin.php';?>