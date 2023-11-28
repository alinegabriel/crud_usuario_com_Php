<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="/mvc/views/template/styles.php" media="screen">
</head>

<body>

    <div class="container">
        <h2>Profile</h2>
        <hr>
        <?php if ($user) : ?>
            <ul>
                <li><b>ID:</b>
                    <?php echo $user['id']; ?>
                </li>
                <li><b>Name:</b>
                    <?php echo $user['nome']; ?>
                </li>
                <li><b>CPF:</b>
                    <?php echo $user['cpf']; ?>
                </li>
                <li><b>Birthday:</b>
                    <?php echo $user['data_nascimento']; ?>
                </li>
                <li><b>Phone:</b>
                    <?php echo $user['telefone']; ?>
                </li>
                <li><b>E-mail:</b>
                    <?php echo $user['email']; ?>
                </li>
                <li><b>Address:</b>
                    <?php echo $user['endereco']; ?>
                </li>
                <li><b>City:</b>
                    <?php echo $user['cidade']; ?>
                </li>
                <li><b>State:</b>
                    <?php echo $user['estado']; ?>
                </li>
            </ul>
        <?php else : ?>
            <p>Usuário não encontrado.</p>
        <?php endif; ?>
        <br>
        <div class="text-center">
            <a class="btn btn-dark" href="<?php echo APP; ?>user/listar">Back</a>

            <a class="btn btn-dark" href="<?php echo APP; ?>user/editar/<?php echo $user['id'] ?>">Edit</a>
        </div>
    </div>
</body>