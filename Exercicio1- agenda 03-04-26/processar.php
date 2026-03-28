<?php
declare(strict_types=1);

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php', true, 303);
    exit;
}

if (!isset($_SESSION['contatos']) || !is_array($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

$nome = trim((string) ($_POST['nome'] ?? ''));
$telefone = trim((string) ($_POST['telefone'] ?? ''));

if ($nome === '' || $telefone === '') {
    header('Location: index.php', true, 303);
    exit;
}

$_SESSION['contatos'][] = [
    'nome' => $nome,
    'telefone' => $telefone,
];

header('Location: index.php', true, 303);
exit;
