<?php

namespace App\Controllers;

use App\Models\Entrevista;

class EntrevistasController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Entrevista();
    }

    public function index()
    {
        $candidatos = $this->model->listarCandidatos();

        echo "<h1>Lista de Candidatos</h1>";
        echo "<tr>";
        foreach ($candidatos as $candidato)
        {
            echo "<td>Nome: {$candidato['nome']} <br>Email: {$candidato['email']} <br>Telefone: {$candidato['telefone']} <br>Cargo: {$candidato['cargo_desejado']} <br><a href='?url=entrevistas/delete/{$candidato['id']}'>Excluir</a><hr></td>";
        }
        echo "</tr>";
    }

    public function delete($id)
    {
        $this->model->deletarCandidato($id);
        header('Location: /?url=entrevistas/index');
        exit;
    }
}
