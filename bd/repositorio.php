<?php
    class Repositorio {
        private $usuario = "root";
        private $senha = "aluno";
        private $servidor = "localhost:3306";
        private $banco = "rpg";

        private function conectar() {
            return new PDO('mysql:host='. $this->servidor . ';dbname=' . $this->banco, $this->usuario, $this->senha);
        }

        public function inserir($nome, $raridade, $level, $recompensa) {
            $conexao = $this->conectar();
            try {
                $statement = $conexao->prepare("INSERT INTO Monstro VALUES (NULL, ?, ?, ?, ?)");
                $statement->bindParam(1, $nome);
                $statement->bindParam(2, $raridade);
                $statement->bindParam(3, $level);
                $statement->bindParam(4, $recompensa);
                $statement->execute();

                $conexao = null;
                return true;
            } catch (\Throwable $th) {
                // caso algum erro aconteça na inserção...
                $conexao = null;
                return false;
            }
        }

        private function existe($codigo) {
            $conexao = $this->conectar();
            try {
                $resultset = $conexao->query("SELECT * FROM Monstro WHERE idMonstro = ?");
                $resultset->bindParam(1, $codigo);
                
                if ($resultset->execute()) {
                    if ($resultset->rowCount() == 1) {
                        $conexao = null;
                        return true;
                    } else {
                        $conexao = null;
                        return false;
                    }                    
                } else {
                    $conexao = null;
                    return false;
                }
            } catch (\Throwable $th) {
                $conexao = null;
                return false;
            }
        }

        public function remover($codigo) {
            if (!$this->existe($codigo)) {
                return false;
            }

            $conexao = $this->conectar();
        }
    }

?>