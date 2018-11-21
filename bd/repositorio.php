<?php
    class Repositorio {
        private $usuario = "root";
        private $senha = "aluno";
        private $servidor = "localhost:3306";
        private $banco = "rpg";

        private function conectar() {
            $conexao = new PDO('mysql:host='. $this->servidor . ';dbname=' . $this->banco, $this->usuario, $this->senha);
            $conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            return $conexao;
        }

        public function inserir($nome, $raridade, $level, $recompensa, $detalhes) {
            $conexao = $this->conectar();
            
            try {
                $statement = $conexao->prepare("INSERT INTO Monstro(nome, raridade, level, recompensa, detalhes) VALUES (?, ?, ?, ?, ?)");
                $statement->bindParam(1, $nome);
                $statement->bindParam(2, $raridade);
                $statement->bindParam(3, $level);
                $statement->bindParam(4, $recompensa);
                $statement->bindParam(5, $detalhes);

                if ($statement->execute()) {
                    $conexao = null;
                    return true;
                } else {
                    $conexao = null;
                    return false;
                }
            } catch (\Throwable $th) {
                // caso algum erro aconteça na inserção...
                $conexao = null;
                return false;
            }
        }

        public function buscarTodos() {
            $conexao = $this->conectar();

            try {
                $statement = $conexao->prepare("SELECT * FROM Monstro");
                $statement->execute();
                
                $conexao = null;
                return $statement->fetchAll();
            } catch (\Throwable $th) {
                $conexao = null;
                return array();
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
            $statement = $conexao->prepare("DELETE FROM Monstro WHERE idMonstro = ?");
            $statement->bindParam(1, $codigo);
            $resultado =  $statement->execute();
            $conexao = null;

            return $resultado;
        }
    }

?>