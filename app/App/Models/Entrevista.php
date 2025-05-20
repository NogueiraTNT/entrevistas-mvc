<?php

namespace App\Models;

use PDO;

class Entrevista extends BaseModel 
{
    public function listarTodas() 
    {
        $stmt = $this->db->query("SELECT * FROM entrevistas ORDER BY data DESC");
        return $stmt->fechAll();
    }

    public function buscarPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrevistas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fechAll();
    }

    public function criar($dados)
    {
        $stmt = $this->db->prepare("INSERT INTO entrvistas (candidato_id, data_hora, modalidade, local, link, status) VALUES (:idCandidato, :data, :modalidade, :local, :link, :status)");
        return $stmt->execute([
            'candidato_id' = $dados['idCandidato'],
            'data_hora' = $dados['data'],
            'modalidade' = $dados['modalidade'],
            'local' = $dados['local'],
            'link' = $dados['link'],
            'status' = $dados['status']
        ]);
    }

}