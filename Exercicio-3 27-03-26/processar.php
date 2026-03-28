<?php
declare(strict_types=1);

session_start();

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html', true, 303);
    exit;
}

$nome = trim((string) ($_POST['nome'] ?? ''));
$telefone = trim((string) ($_POST['telefone'] ?? ''));

if ($nome === '' || $telefone === '') {
    echo '<p>Dados incompletos.</p><p><a href="index.html">Voltar</a></p>';
    exit;
}

$_SESSION['nome_usuario'] = $nome;
$_SESSION['telefone_usuario'] = $telefone;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados na sessão</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        dl { margin: 1rem 0; }
        dt { font-weight: 600; margin-top: 0.75rem; }
        dd { margin: 0.25rem 0 0 0; }
    </style>
</head>
<body>
    <h1>Valores gravados em <code>$_SESSION</code></h1>
    <dl>
        <dt><code>$_SESSION['nome_usuario']</code></dt>
        <dd><?php echo htmlspecialchars((string) $_SESSION['nome_usuario'], ENT_QUOTES, 'UTF-8'); ?></dd>
        <dt><code>$_SESSION['telefone_usuario']</code></dt>
        <dd><?php echo htmlspecialchars((string) $_SESSION['telefone_usuario'], ENT_QUOTES, 'UTF-8'); ?></dd>
    </dl>
    <p><a href="index.html">Enviar outros dados</a></p>
</body>
</html>
