<?php

require_once 'Conection.php';


abstract class Model
{
  protected $conexao;
  protected $tabela = "";
  protected $query = "";
  protected $ordem = "id";

  public function __construct()
  {
    $this->conexao = Conection::conectar();
  }

  /**
   * Insere um novo registro no banco de dados
   * @param array $data - array associativo onde as chaves são os nomes das colunas
   * e os valores são os valores das colunas
   * @throws InvalidArgumentException se $data não for um array ou estiver vazio
   */
  public function create($data)
  {
    if (empty($data)) {
      throw new InvalidArgumentException("Data cannot be empty");
    }

    if (isset($data['id'])) {
      unset($data['id']);
    }
    $keys = array_keys($data);
    $fields = implode(", ", $keys);
    $values = ":" . implode(", :", $keys);
    $sql = "INSERT INTO $this->tabela ($fields) VALUES($values)";
    $statement = $this->conexao->prepare($sql);
    foreach ($keys as $key) {
      $statement->bindParam(":$key", $data[$key]);
    }
    try {
      $statement->execute();
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }
  }

  /**
   * Busca todos os registros do banco de dados
   * @return array - um array de arrays associativos representando cada linha da tabela
   * @throws PDOException se houver um erro ao executar a instrução
   */
  public function read(): array
  {
    $sql = "SELECT * FROM $this->tabela";
    $statement = $this->conexao->prepare($sql);
    try {
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }
  }

  /**
   * Atualiza um registro no banco de dados
   * @param array $data - array associativo onde as chaves são os nomes das colunas e os valores
   * são os valores das colunas
   */
  public function update(array $data)
  {
    if (empty($data)) {
      throw new InvalidArgumentException("Data cannot be empty");
    }

    $fields = "";
    $keys = array_keys($data);
    foreach ($keys as $key) {
      $fields .= "$key = :$key, ";
    }
    $fields = rtrim($fields, ', ');

    $sql = "UPDATE $this->tabela SET $fields WHERE id = :id";
    $statement = $this->conexao->prepare($sql);
    try {
      $statement->execute($data);
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }
  }

  /**
   * Exclui um registro do banco de dados
   * @param int $id - o ID do registro a ser excluído
   * @throws PDOException se houver um erro ao executar a instrução
   */
  public function delete(int $id)
  {
    $sql = "DELETE FROM $this->tabela WHERE id = :id";
    $statement = $this->conexao->prepare($sql);
    $statement->bindParam(":id", $id);
    try {
      $statement->execute();
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }
  }

  /**
   * Busca um registro no banco de dados pelo seu ID
   * @param int $id - o ID do registro a ser buscado
   * @return array - um array associativo representando a linha buscada
   * @throws PDOException se houver um erro ao executar a instrução
   */
  public function getById(int $id): array
  {
    $sql = "SELECT * FROM $this->tabela WHERE id = :id";
    $sentenca = $this->conexao->prepare($sql);
    $sentenca->bindParam(":id", $id);
    try {
      $sentenca->execute();
      $dados = $sentenca->fetch(PDO::FETCH_ASSOC);
      return $dados ? $dados : [];
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }
  }
}
