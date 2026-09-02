<?php

session_start();


spl_autoload_register(function ($nome_classe) {
    
    if (file_exists('app/Controllers/' . $nome_classe . '.php')) {
        require_once 'app/Controllers/' . $nome_classe . '.php';
    } 
    
    else if (file_exists('app/Models/' . $nome_classe . '.php')) {
        require_once 'app/Models/' . $nome_classe . '.php';
    }
});


$rota_atual = isset($_GET['rota']) ? $_GET['rota'] : 'login';


if ($rota_atual == 'login') {
    
    $controlador = new LoginController();
    $controlador->exibirTela();
    
} elseif ($rota_atual == 'logar') {

    $controlador = new LoginController();
    $controlador->fazerLogin();
    
} elseif ($rota_atual == 'dashboard') {
    
    $controlador = new DashboardController();
    $controlador->abrirPainel();

} elseif ($rota_atual == 'sair') {
    
    session_destroy();
    header("Location: index.php?rota=login");
    exit;

} else {
    echo "<h3>Página não encontrada!</h3>";
}
?>