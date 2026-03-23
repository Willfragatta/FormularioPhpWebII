<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html', true, 303);
    exit;
}

$bruto = $_POST['numeros'] ?? null;

if (!is_array($bruto) || count($bruto) !== 5) {
    echo '<p>Erro: envie exatamente cinco números pelo formulário.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

$numeros = [];
foreach ($bruto as $valor) {
    if ($valor === '' || !is_numeric($valor)) {
        echo '<p>Erro: todos os campos devem ser números válidos.</p>';
        echo '<p><a href="index.html">Voltar</a></p>';
        exit;
    }
    $numeros[] = (float) $valor;
}


$unicos = array_unique($numeros, SORT_REGULAR);
if (count($unicos) !== 5) {
    echo '<p>Erro: os cinco números precisam ser <strong>diferentes</strong> entre si.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; }
        pre { background: #f4f4f4; padding: 1rem; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Valores na ordem de inserção</h1>
    <ul>
        <?php foreach ($numeros as $i => $n): ?>
            <li>Posição <?php echo $i + 1; ?>: <?php echo htmlspecialchars((string) $n, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Array completo (toda a lista)</h2>
    <pre><?php echo htmlspecialchars(print_r($numeros, true), ENT_QUOTES, 'UTF-8'); ?></pre>

    <p><a href="index.html">Novo envio</a></p>
</body>
</html>
