<?php
class UserController extends Controller
{

  /**
   * Lista todos os usuários.
   * Este método recupera todos os usuários do banco de dados e os envia para a view.
   * @return void
   */
  public function listar()
  {
    try {
      $model = new User();
      $users = $model->read();
    } catch (Exception $e) {
      error_log($e->getMessage());
      $users = [];
    }
    $this->view(
      "listagemUser",
      compact('users')
    );
  }

  /**
   * Cria um novo usuário.
   * Este método cria um novo usuário com valores padrão e envia para a view.
   * @return void
   */
  public function novo(): void
  {
    $user = [
      'id' => 0,
      'nome' => "",
      'cpf' => "",
      'data_nascimento' => "",
      'email' => "",
      'telefone' => "",
      'cep' => "",
      'endereco' => "",
      'cidade' => "",
      'estado' => "",
    ];

    $this->view('formUser', compact('user'));
  }

  /**
   * Salva um usuário.
   * Este método salva um novo usuário ou atualiza um usuário existente no banco de dados.
   * @return void
   */
  public function salvar(): void
  {
    $user = array();
    $user['id'] = $_POST['id'] ?? null;
    $user['nome'] = $_POST['nome'] ?? null;
    $user['cpf'] = $_POST['cpf'] ?? null;
    $user['data_nascimento'] = $_POST['data_nascimento'] ?? null;
    $user['email'] = $_POST['email'] ?? null;
    $user['telefone'] = $_POST['telefone'] ?? null;
    $user['cep'] = $_POST['cep'] ?? null;
    $user['endereco'] = $_POST['endereco'] ?? null;
    $user['cidade'] = $_POST['cidade'] ?? null;
    $user['estado'] = $_POST['estado'] ?? null;

    $model = new User();
    try {
      if ($user['id'] == 0) {
        $model->create($user);
      } else {
        $model->update($user);
      }
    } catch (Exception $e) {
      error_log($e->getMessage());
    }

    $this->redirect('user/listar');
  }


  /**
   * Edita um usuário.
   * Este método recupera um usuário pelo ID do banco de dados e envia para a view.
   * @param int $id The ID of the user to edit.
   * @return void
   */
  public function editar(int $id): void
  {
    $model = new User();
    try {
      $user = $model->getById($id);
    } catch (Exception $e) {
      error_log($e->getMessage());
      $user = null;
    }

    $this->view('formUser', compact('user'));
  }

  /**
   * Exclui um usuário.
   * Este método exclui um usuário pelo ID do banco de dados.
   * @param int $id The ID of the user to delete.
   * @return void
   */
  public function excluir(int $id): void
  {
    $model = new User();
    try {
      $model->delete($id);
    } catch (Exception $e) {
      error_log($e->getMessage());
    }

    $this->redirect('user/listar');
  }

  /**
   * Mostra o perfil de um usuário.
   * Este método recupera um usuário pelo ID do banco de dados e envia para a view.
   * @param int $id The ID of the user to display.
   * @return void
   */
  public function perfil(int $id): void
  {
    $model = new User();
    try {
      $user = $model->getById($id);
      if ($user) {
        $this->view('perfilUser', compact('user'));
      } else {
        echo "Usuário não encontrado.";
      }
    } catch (Exception $e) {
      error_log($e->getMessage());
      echo "Erro ao recuperar usuário.";
    }
  }
}
