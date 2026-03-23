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

/** @var list<float> $arrayNumerico */
$arrayNumerico = [];

foreach ($bruto as $valor) {
    if ($valor === '' || !is_numeric($valor)) {
        echo '<p>Erro: todos os campos devem ser números válidos.</p>';
        echo '<p><a href="index.html">Voltar</a></p>';
        exit;
    }
    $arrayNumerico[] = (float) $valor;
}

$unicos = array_unique($arrayNumerico, SORT_REGULAR);
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
    <title>Array numérico – resultado</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        pre { background: #f4f4f4; padding: 1rem; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Valores conforme a inserção</h1>
    <p>Números adicionados ao <strong>array numérico</strong>, na ordem em que foram enviados:</p>
    <ul>
        <?php foreach ($arrayNumerico as $indice => $numero): ?>
            <li><?php echo $indice + 1; ?>º na ordem de inserção: <?php echo htmlspecialchars((string) $numero, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Impressão de todo o array</h2>
    <pre><?php echo htmlspecialchars(print_r($arrayNumerico, true), ENT_QUOTES, 'UTF-8'); ?></pre>

    <p><a href="index.html">Novo envio</a></p>
</body>
</html>
