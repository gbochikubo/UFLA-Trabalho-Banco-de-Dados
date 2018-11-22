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

        public function atualizar($codigo, $dados) {
            if (count($dados) == 0) {
                return true;
            }

            $sql = "UPDATE Monstro SET ";
            $qtdChaves = count($dados);
            $atual = 0;
            foreach ($dados as $chave => $valor) {
                $sql = $sql . $chave . "=?";
                if ($atual != ($qtdChaves - 1)) {
                    $sql = $sql . ", ";
                }
            }

            $statement = $conexao->prepare($sql);
            foreach($dados as $chave => $valor) {
                $statement->bindParam($chave, $valor);
            }
            
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
                    throw new PDOException($statement->errorInfo());
                }
            } catch (PDOException $err) {
                // propaga o erro de PDO...
                throw new PDOException($err);
            } catch (Exception $th) {
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

        public function buscar($codigo) {
            $conexao = $this->conectar();

            try {
                $statement = $conexao->prepare("SELECT * FROM Monstro WHERE id_monstro = ?");
                $statement->bindParam(1, $codigo);
                $statement->execute();
                if ($statement->rowCount()) {
                    return $statement->fetch();
                } else {
                    return array();
                }
            } catch (\Throwable $td) {
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
            $conexao = $this->conectar();
            $statement = $conexao->prepare("DELETE FROM Monstro WHERE id_monstro = ?");
            $statement->bindParam(1, $codigo);
            $resultado =  $statement->execute();
            $conexao = null;
            print_r($statement->errorInfo());
            return $resultado;
        }
    }

?>