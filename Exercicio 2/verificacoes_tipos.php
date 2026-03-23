<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

$amostras = [
    42,
    3.14,
    'Texto PHP',
    '123',
    true,
    null,
    [1, 2],
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de tipos – is_int, is_float, is_string e gettype</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 48rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: 0.5rem 0.75rem; text-align: left; }
        th { background: #f0f0f0; }
        code { background: #f4f4f4; padding: 0.1rem 0.35rem; border-radius: 3px; }
        .sim { color: #0a6b0a; font-weight: 600; }
        .nao { color: #888; }
    </style>
</head>
<body>
    <h1>Verificações de tipo em PHP</h1>
    <p>
        Para cada valor abaixo, <code>gettype()</code> indica o tipo que o PHP reconhece.
        As colunas <code>is_int()</code>, <code>is_float()</code> e <code>is_string()</code> mostram se a verificação correspondente retorna verdadeiro.
    </p>

    <table>
        <thead>
            <tr>
                <th>Valor (representação)</th>
                <th><code>gettype()</code></th>
                <th><code>is_int()</code></th>
                <th><code>is_float()</code></th>
                <th><code>is_string()</code></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amostras as $item): ?>
                <tr>
                    <td><code><?php echo htmlspecialchars(json_encode($item, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8'); ?></code></td>
                    <td><strong><?php echo htmlspecialchars(gettype($item), ENT_QUOTES, 'UTF-8'); ?></strong></td>
                    <td class="<?php echo is_int($item) ? 'sim' : 'nao'; ?>">
                        <?php echo is_int($item) ? 'sim' : 'não'; ?>
                    </td>
                    <td class="<?php echo is_float($item) ? 'sim' : 'nao'; ?>">
                        <?php echo is_float($item) ? 'sim' : 'não'; ?>
                    </td>
                    <td class="<?php echo is_string($item) ? 'sim' : 'nao'; ?>">
                        <?php echo is_string($item) ? 'sim' : 'não'; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Observações rápidas</h2>
    <ul>
        <li><code>is_string('123')</code> é verdadeiro: entre aspas, o PHP trata como texto, mesmo parecendo número.</li>
        <li><code>is_int()</code> e <code>is_float()</code> distinguem inteiros e números de ponto flutuante.</li>
        <li><code>gettype()</code> sempre retorna uma string com o nome do tipo (por exemplo <code>integer</code>, <code>double</code>, <code>string</code>).</li>
    </ul>
</body>
</html>
