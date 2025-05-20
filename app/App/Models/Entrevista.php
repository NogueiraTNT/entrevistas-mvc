<?php

namespace App\Models;

use Core\Database;
use PDO;

class Entrevista extends BaseModel 
{
    //Inicia as funções de Entrevistas
    public function listarTodas() 
    {
        $stmt = $this->db->query("SELECT * FROM entrevistas ORDER BY data DESC");
        return $stmt->fetchAll();
    }

    public function buscarPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function criar($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO entrvistas (candidato_id, data_hora, modalidade, local, link, status) VALUES (:idCandidato, :data, :modalidade, :local, :link, :status)");
        return $stmt->execute([
            'candidato_id' => $dado['idCandidato'],
            'data_hora' => $dado['data'],
            'modalidade' => $dado['modalidade'],
            'local' => $dado['local'],
            'link' => $dado['link'],
            'status' => $dado['status']
        ]);
    }

    //Inicia as funções de Candidatos
    public function listarCandidatos()
    {
        $stmt = $this->db->query("SELECT * FROM candidato");
        return $stmt->fetchAll();
    }

    public function buscarCandidatoId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function buscarCandidatoNome($nome)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE nome = :nome");
        $stmt->execute(['nome' => $nome]);
        return $stmt->fetchAll();
    }

    public function buscarCandidatoEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchAll();
    }

    public function buscarCandidatoCel($telefone)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE telefone = :telefone");
        $stmt->execute(['telefone' => $telefone]);
        return $stmt->fetchAll();
    }

    public function buscarCandidatoCargo($cargo)
    {
        $stmt = $this->db->prepare("SELECT * FROM candidato WHERE cargo_desejado = :cargo");
        $stmt->execute(['cargo' => $cargo]);
        return $stmt->fetchAll();
    }

    public function criarCandidato($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO candidato (nome, email, telefone, cargo_desejado, curriculo_path) VALUES (:nome, :email, :telefone, :cargo_desejado, :curriculo_path)");
        return $stmt->execute([
            'nome' => $dado['nome'],
            'email' => $dado['email'],
            'telefone' => $dado['telefone'],
            'cargo_desejado' => $dado['cargo_desejado'],
            'curriculo_path' => $dado['curriculo_path']
        ]);
    }

    public function deletarCandidato($id)
    {
        $stmt = $this->db->prepare("DELETE FROM candidato WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
    public function listarEntrevistador()
    {
        $stmt = $this->db->query("SELECT * FROM entrevistadores");
        return $stmt->fetchAll();
    }

    //Inicia as funções de Entrevistador
    public function buscarEntrevistadorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function buscarEntrevistadorNome($nome)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE nome = :nome");
        $stmt->execute(['nome' => $nome]);
        return $stmt->fetchAll();
    }

    public function buscarEntrevistadorEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchAll();
    }

    public function buscarEntrevistadorCel($especialidade)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistadores WHERE especialidade = :especialidade");
        $stmt->execute(['especialidade' => $especialidade]);
        return $stmt->fetchAll();
    }


    public function criarEntrevistador($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO entrevistadores (nome, email, especialidade) VALUES (:nome, :email, :especialidade)");
        return $stmt->execute([
            'nome' => $dado['nome'],
            'email' => $dado['email'],
            'especialidade' => $dado['especialidade']
        ]);
    }

    public function deletarEntrevistador($id)
    {
        $stmt = $this->db->prepare("DELETE FROM entrevistadores WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}