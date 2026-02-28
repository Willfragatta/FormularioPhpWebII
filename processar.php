<?php
/**
 * Processa o formulário de Depoimentos Acadêmicos.
 * Valida os campos obrigatórios (Nome e E-mail) no servidor.
 */

$erros = [];
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$curso = trim($_POST['curso'] ?? '');
$depoimento = trim($_POST['depoimento'] ?? '');

// Validação no servidor (campos obrigatórios)
if (empty($nome)) {
    $erros[] = 'O campo Nome é obrigatório.';
}
if (empty($email)) {
    $erros[] = 'O campo E-mail é obrigatório.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'Informe um e-mail válido.';
}

if (!empty($erros)) {
    // Se houver erros, exibe as mensagens e link para voltar
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro - Depoimentos Acadêmicos</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; background: #f5f5f5; }
            .box { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
            .erro { color: #c00; margin: 8px 0; }
            a { color: #2563eb; }
        </style>
    </head>
    <body>
        <div class="box">
            <h2>Corrija os erros:</h2>
            <?php foreach ($erros as $erro): ?>
                <p class="erro"><?= htmlspecialchars($erro) ?></p>
            <?php endforeach; ?>
            <p><a href="index.html">← Voltar ao formulário</a></p>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Dados válidos: exibe a confirmação com os dados enviados
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depoimento recebido - Depoimentos Acadêmicos</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; max-width: 560px; margin: 40px auto; padding: 20px; background: #f5f5f5; }
        .box { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        h2 { color: #166534; margin-top: 0; }
        .campo { margin-bottom: 16px; }
        .campo strong { display: block; color: #555; font-size: 0.9rem; margin-bottom: 4px; }
        .valor { color: #333; }
        .valor.vazio { color: #999; font-style: italic; }
        a { color: #2563eb; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Depoimento enviado com sucesso!</h2>
        <p>Obrigado por compartilhar sua experiência. Seguem os dados recebidos:</p>

        <div class="campo">
            <strong>Nome</strong>
            <span class="valor"><?= htmlspecialchars($nome) ?></span>
        </div>
        <div class="campo">
            <strong>E-mail</strong>
            <span class="valor"><?= htmlspecialchars($email) ?></span>
        </div>
        <div class="campo">
            <strong>Curso</strong>
            <span class="valor <?= $curso === '' ? 'vazio' : '' ?>"><?= $curso !== '' ? htmlspecialchars($curso) : '(não informado)' ?></span>
        </div>
        <div class="campo">
            <strong>Depoimento</strong>
            <span class="valor <?= $depoimento === '' ? 'vazio' : '' ?>"><?= $depoimento !== '' ? nl2br(htmlspecialchars($depoimento)) : '(não informado)' ?></span>
        </div>

        <p><a href="index.html">Enviar outro depoimento</a></p>
    </div>
</body>
</html>
