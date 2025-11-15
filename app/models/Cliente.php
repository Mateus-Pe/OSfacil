<?php

namespace App\Models;
use Leaf\Model;

class Cliente extends Model
{
    public function __construct()
    {
        $dbFile = 'osfacil.db';
        if (!file_exists($dbFile)) {
            file_put_contents($dbFile, '');
        }

        db()->connect([
            'dbtype' => 'sqlite',
            'dbname' => $dbFile,
        ]);

        db()->query("
            CREATE TABLE IF NOT EXISTS clientes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                telefone TEXT,
                email TEXT,
                endereco TEXT,
                observacoes TEXT,
                criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ")->execute();
    }

    public function salvar($dados)
    {
        db()->insert('clientes')->params([
            'nome' => $dados['nome'],
            'telefone' => $dados['telefone'],
            'email' => $dados['email'],
            'endereco' => $dados['endereco'],
            'observacoes' => $dados['observacoes']
        ])->execute();
    }

    public function listar()
    {
        return db()->select('clientes')->all();
    }

    public function deletar($id)
    {
        return db()->delete('clientes')->where('id', $id)->execute();
    }

    public function temOsVinculadas($id)
    {
        $result = db()->select('os')->where('cliente_id', $id)->all();
        return count($result) > 0;
    }
}
