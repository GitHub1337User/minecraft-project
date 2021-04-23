<?php

session_start();

if ($_SESSION['admin']) {
    header('Location: ADMIN-PANEL/admin-panel.php');
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/index.view.php';