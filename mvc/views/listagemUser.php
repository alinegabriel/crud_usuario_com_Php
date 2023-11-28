<head>
  <link rel="stylesheet" href="../views/template/styles.php" media="screen">
</head>

<body>
  <h2>Users list</h2>
  <hr>
  <table class="table table-striped table-hover table-bordered" aria-describedby="table-description">
    <thead>
      <?php
      if (empty($users)) {
        echo "Não há usuários cadastrados"; 
      } else {
        echo "
    <tr>
      <th><b>ID</b></th>
      <th><b>Name</b></th>
      <th><b>Profile</b></th>
      <th><b>Edit</b></th>
      <th><b>Delete</b></th>
    </tr>";
        foreach ($users as $user) {
          $path_editar = APP . 'user/editar';
          $path_excluir = APP . 'user/excluir';
          $path_detalhes = APP . 'user/perfil';

          echo "
      <tr>
        <td>{$user['id']}</td>
        <td>{$user['nome']}</td>
        <td><a class='btn btn-dark' href='$path_detalhes/{$user['id']}'>View</a></td>
        <td><a class='btn btn-primary' href='$path_editar/{$user['id']}'>+</a></td>
        <td><a class='btn btn-danger' href='$path_excluir/{$user['id']}'>-</a></td>
      </tr>";
        }
      }
      ?>
      </tbody>
  </table>