<?php

namespace App\Models;

use PDO;

class Candidato extends BaseModel
{
    public function listarCandidatos()
    {
        $stmt = $this->db->query("SELECT * FROM candidato");
        return $stmt->fechAll();
    }

    public function buscarCandidatoId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fechAll();
    }

    public function buscarCandidatoNome($nome)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE nome = :nome");
        $stmt->execute(['nome' => $nome]);
        return $stmt->fechAll();
    }

    public function buscarCandidatoEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fechAll();
    }

    public function buscarCandidatoCel($telefone)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE telefone = :telefone");
        $stmt->execute(['telefone' => $telefone]);
        return $stmt->fechAll();
    }

    public function buscarCandidatoCargo($cargo)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE cargo_desejado = :cargo");
        $stmt->execute(['cargo' => $cargo]);
        return $stmt->fechAll();
    }

    public function criarCandidato($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO candidato (nome, email, telefone, cargo_desejado, curriculo_path) FROM (:nome, :email, :telefone, :cargo_desejado, :curriculo_path)");
        return $stmt->execute([
            'nome' = $dados['nome'],
            'email' = $dados['email'],
            'telefone' = $dados['telefone'],
            'cargo_desejado' = $dados['cargo_desejado'],
            'curriculo_path' = $dados['curriculo_path']
        ]);
    }

    public function deletarCandidato($id)
    {
        $stmt = $this->db->prepare("DELETE FROM candidato WHERE id = :id");
        return $stmt->execute(['id' = $id]);
    }
}