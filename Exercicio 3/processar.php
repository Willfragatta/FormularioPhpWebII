<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html', true, 303);
    exit;
}

$nomeBruto = $_POST['nome_produto'] ?? '';
$valorBruto = $_POST['valor'] ?? '';
$quantidadeBruta = $_POST['quantidade'] ?? '';

$nome = trim((string) $nomeBruto);

if ($nome === '') {
    echo '<p>Erro: informe o nome do produto.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

if ($valorBruto === '' || !is_numeric($valorBruto)) {
    echo '<p>Erro: o valor deve ser um número válido.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

if ($quantidadeBruta === '' || !ctype_digit((string) $quantidadeBruta)) {
    echo '<p>Erro: a quantidade deve ser um número inteiro positivo.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

$valorUnitario = (float) $valorBruto;
$quantidade = (int) $quantidadeBruta;

if ($valorUnitario < 0) {
    echo '<p>Erro: o valor não pode ser negativo.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

if ($quantidade < 1) {
    echo '<p>Erro: a quantidade deve ser pelo menos 1.</p>';
    echo '<p><a href="index.html">Voltar</a></p>';
    exit;
}

$total = $valorUnitario * $quantidade;

function formatarMoedaBrl(float $valor): string
{
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo da compra</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        dl { margin: 1rem 0; }
        dt { font-weight: 600; margin-top: 0.75rem; }
        dd { margin: 0.25rem 0 0 0; }
        .total { font-size: 1.25rem; margin-top: 1.5rem; padding-top: 1rem; border-top: 2px solid #333; }
    </style>
</head>
<body>
    <h1>Informações da compra</h1>

    <dl>
        <dt>Nome do produto</dt>
        <dd><?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?></dd>

        <dt>Valor unitário</dt>
        <dd><?php echo htmlspecialchars(formatarMoedaBrl($valorUnitario), ENT_QUOTES, 'UTF-8'); ?></dd>

        <dt>Quantidade comprada</dt>
        <dd><?php echo htmlspecialchars((string) $quantidade, ENT_QUOTES, 'UTF-8'); ?></dd>
    </dl>

    <p class="total"><strong>Gasto total:</strong> <?php echo htmlspecialchars(formatarMoedaBrl($total), ENT_QUOTES, 'UTF-8'); ?></p>

    <p><a href="index.html">Nova compra</a></p>
</body>
</html>
