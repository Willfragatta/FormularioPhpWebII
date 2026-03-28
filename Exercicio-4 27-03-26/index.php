<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['contatos']) || !is_array($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

header('Content-Type: text/html; charset=UTF-8');

$contatos = $_SESSION['contatos'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 32rem; margin: 2rem auto; padding: 0 1rem; line-height: 1.5; }
        label { display: block; margin-top: 0.75rem; }
        input { width: 100%; padding: 0.4rem; margin-top: 0.25rem; box-sizing: border-box; }
        button { margin-top: 1.25rem; padding: 0.5rem 1rem; cursor: pointer; }
        ul { list-style: none; padding: 0; margin: 1rem 0 0 0; }
        li { border: 1px solid #ddd; padding: 0.75rem; margin-top: 0.5rem; border-radius: 4px; }
        h2 { margin-top: 2rem; font-size: 1.1rem; }
    </style>
</head>
<body>
    <h1>Agenda de contatos</h1>

    <form action="processar.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required maxlength="200" autocomplete="name">

        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" required maxlength="30" autocomplete="tel">

        <button type="submit">Adicionar contato</button>
    </form>

    <h2>Lista de contatos</h2>
    <?php if (count($contatos) === 0): ?>
        <p>Nenhum contato ainda.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($contatos as $c): ?>
                <li>
                    <strong><?php echo htmlspecialchars((string) $c['nome'], ENT_QUOTES, 'UTF-8'); ?></strong><br>
                    <?php echo htmlspecialchars((string) $c['telefone'], ENT_QUOTES, 'UTF-8'); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
