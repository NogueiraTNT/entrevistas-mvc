<?php

namespace App\Models;

use PDO;

class Entrevistador extends BaseModel
{
    public function listarEntrevistador()
    {
        $stmt = $this->db->query("SELECT * FROM entrevistadores");
        return $stmt->fechAll();
    }

    public function buscarEntrevistadorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fechAll();
    }

    public function buscarEntrevistadorNome($nome)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE nome = :nome");
        $stmt->execute(['nome' => $nome]);
        return $stmt->fechAll();
    }

    public function buscarEntrevistadorEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fechAll();
    }

    public function buscarEntrevistadorCel($especialidade)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE especialidade = :especialidade");
        $stmt->execute(['especialidade' => $especialidade]);
        return $stmt->fechAll();
    }


    public function criarEntrevistador($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO entrevistadores (nome, email, especialidade) FROM (:nome, :email, :especialidade)");
        return $stmt->execute([
            'nome' = $dados['nome'],
            'email' = $dados['email'],
            'especialidade' = $dados['especialidade']
        ]);
    }

    public function deletarEntrevistador($id)
    {
        $stmt = $this->db->prepare("DELETE FROM entrevistadores WHERE id = :id");
        return $stmt->execute(['id' = $id]);
    }
}