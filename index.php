<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario_id'])) {
    // Redirigir al dashboard si el usuario está autenticado
    header("Location: vista/dashboard");
    exit();
} else {
    // Redirigir al login si el usuario no está autenticado
    header("Location: login");
    exit();
}
?>