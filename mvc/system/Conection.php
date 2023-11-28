<?php
class Conection
{
  public static function conectar()
  {
    try {
      $endereco = 'localhost';
      $banco = 'usuario';
      $usuario = 'postgres';
      $senha = 'postgres';

      $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      $conexao = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, $opcoes);
      return $conexao;
    } catch (PDOException $e) {
      echo "Erro na conexão com o banco de dados: " . $e->getMessage();
      return null;
    }
  }
}
?>
