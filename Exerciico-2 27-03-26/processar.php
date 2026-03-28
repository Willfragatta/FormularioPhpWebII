<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html', true, 303);
    exit;
}

$n1 = trim((string) ($_POST['contato1_nome'] ?? ''));
$t1 = trim((string) ($_POST['contato1_telefone'] ?? ''));
$e1 = trim((string) ($_POST['contato1_email'] ?? ''));
$n2 = trim((string) ($_POST['contato2_nome'] ?? ''));
$t2 = trim((string) ($_POST['contato2_telefone'] ?? ''));
$e2 = trim((string) ($_POST['contato2_email'] ?? ''));

if ($n1 === '' || $t1 === '' || $e1 === '' || $n2 === '' || $t2 === '' || $e2 === '') {
    echo '<p>Dados incompletos.</p><p><a href="index.html">Voltar</a></p>';
    exit;
}

$listaContatos = [];
$listaContatos[1] = [
    'nome' => $n1,
    'telefone' => $t1,
    'email' => $e1,
];
$listaContatos[2] = [
    'nome' => $n2,
    'telefone' => $t2,
    'email' => $e2,
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos recebidos</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 36rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        section { margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #ddd; }
        dl { margin: 0.5rem 0 0 0; }
        dt { font-weight: 600; margin-top: 0.5rem; }
        dd { margin: 0.15rem 0 0 0; }
        pre { background: #f4f4f4; padding: 1rem; overflow-x: auto; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>Informações enviadas</h1>

    <section>
        <h2>Contato 1</h2>
        <dl>
            <dt>Nome</dt>
            <dd><?php echo htmlspecialchars($listaContatos[1]['nome'], ENT_QUOTES, 'UTF-8'); ?></dd>
            <dt>Telefone</dt>
            <dd><?php echo htmlspecialchars($listaContatos[1]['telefone'], ENT_QUOTES, 'UTF-8'); ?></dd>
            <dt>E-mail</dt>
            <dd><?php echo htmlspecialchars($listaContatos[1]['email'], ENT_QUOTES, 'UTF-8'); ?></dd>
        </dl>
    </section>

    <section>
        <h2>Contato 2</h2>
        <dl>
            <dt>Nome</dt>
            <dd><?php echo htmlspecialchars($listaContatos[2]['nome'], ENT_QUOTES, 'UTF-8'); ?></dd>
            <dt>Telefone</dt>
            <dd><?php echo htmlspecialchars($listaContatos[2]['telefone'], ENT_QUOTES, 'UTF-8'); ?></dd>
            <dt>E-mail</dt>
            <dd><?php echo htmlspecialchars($listaContatos[2]['email'], ENT_QUOTES, 'UTF-8'); ?></dd>
        </dl>
    </section>

    <h2>Lista (array numérico + associativo)</h2>
    <pre><?php echo htmlspecialchars(print_r($listaContatos, true), ENT_QUOTES, 'UTF-8'); ?></pre>

    <p><a href="index.html">Novo envio</a></p>
</body>
</html>
