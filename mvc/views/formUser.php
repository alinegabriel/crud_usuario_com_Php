<head>
 <link rel="stylesheet" href="../views/template/styles.php" media="screen">
</head>
<h2>Complete the form: </h2>
<form action="<?php echo APP; ?>user/salvar" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly type="text" class="form-control" id="id" value="<?php echo $user['id']; ?>" name="id">
  </div>
  <div class="mb-3">
    <label for="nome" class="form-label">Name: </label>
    <input required type="text" class="form-control" id="nome" value="<?php echo $user['nome']; ?>" name="nome">
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF: </label>
    <input required type="text" class="form-control" id="cpf" value="<?php echo $user['cpf']; ?>" name="cpf">
  </div>
  <div class="mb-3">
    <label for="data_nascimento" class="form-label">Birthday: </label>
    <input required type="text" class="form-control" id="data_nascimento" value="<?php echo $user['data_nascimento']; ?>" name="data_nascimento" onBlur="isValidDate">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-mail: </label>
    <input required type="text" class="form-control" id="email" value="<?php echo $user['email']; ?>" name="email">
  </div>
  <div class="mb-3">
    <label for="telefone" class="form-label">Phone: </label>
    <input required type="text" class="form-control" id="telefone" value="<?php echo $user['telefone']; ?>" name="telefone">
  </div>
  <div class="mb-3">
    <label for="endereco" class="form-label">Address: </label>
    <input required type="text" class="form-control" id="endereco" value="<?php echo $user['endereco']; ?>" name="endereco">
  </div>
  <div class="mb-3">
    <label for="cep" class="form-label">CEP:</label>
    <input required type="text" class="form-control" id="cep" name="cep" onBlur="getAddressData()">
  </div>
  <div class="mb-3">
    <label for="estado" class="form-label">State:</label>
    <select required class="form-control" id="estado" name="estado"></select>
  </div>
  <div class="mb-3">
    <label for="cidade" class="form-label">City:</label>
    <select required class="form-control" id="cidade" name="cidade"></select>
  </div>
  <div class="text-center">
    <button class="btn btn-dark" type="submit" name="button">Save</button>
  </div>
</form>
<script>
  function getAddressData() {
    const cepInput = document.getElementById('cep');
    const cepValue = cepInput.value.replace(/\D/g, '');

    if (cepValue.length !== 8) {
      alert('Invalid CEP format');
      return;
    }

    fetch(`https://viacep.com.br/ws/${cepValue}/json/`)
      .then(response => response.json())
      .then(data => {
        if (data.erro) {
          alert('CEP not found');
          return;
        }

        const estadoSelect = document.getElementById('estado');
        const cidadeSelect = document.getElementById('cidade');

        estadoSelect.innerHTML = '';
        cidadeSelect.innerHTML = '';

        const estadoOption = document.createElement('option');
        estadoOption.value = data.uf;
        estadoOption.text = data.uf;
        estadoSelect.appendChild(estadoOption);

        const cidadeOption = document.createElement('option');
        cidadeOption.value = data.localidade;
        cidadeOption.text = data.localidade;
        cidadeSelect.appendChild(cidadeOption);
      });

    document.getElementById('cep').onBlur = function() {
      if (this.value.length !== 8) {
        return;
      }
      
      getAddressData();
    };
  }
</script>