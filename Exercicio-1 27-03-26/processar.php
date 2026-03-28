<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html', true, 303);
    exit;
}

$nome = trim((string) ($_POST['nome'] ?? ''));
$telefone = trim((string) ($_POST['telefone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));

if ($nome === '' || $telefone === '' || $email === '') {
    echo '<p>Dados incompletos.</p><p><a href="index.html">Voltar</a></p>';
    exit;
}

$contato = [
    'nome' => $nome,
    'telefone' => $telefone,
    'email' => $email,
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato recebido</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        dl { margin: 1rem 0; }
        dt { font-weight: 600; margin-top: 0.75rem; }
        dd { margin: 0.25rem 0 0 0; }
    </style>
</head>
<body>
    <h1>Informações do contato</h1>
    <dl>
        <dt>Nome</dt>
        <dd><?php echo htmlspecialchars($contato['nome'], ENT_QUOTES, 'UTF-8'); ?></dd>
        <dt>Telefone</dt>
        <dd><?php echo htmlspecialchars($contato['telefone'], ENT_QUOTES, 'UTF-8'); ?></dd>
        <dt>E-mail</dt>
        <dd><?php echo htmlspecialchars($contato['email'], ENT_QUOTES, 'UTF-8'); ?></dd>
    </dl>
    <p><a href="index.html">Novo cadastro</a></p>
</body>
</html>
