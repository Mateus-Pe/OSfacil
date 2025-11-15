<?php

namespace App\Models;

class Vendedor extends Model
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
        CREATE TABLE IF NOT EXISTS vendedores (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          nome TEXT NOT NULL,
          telefone TEXT NOT NULL,
          email TEXT,
          cpf TEXT NOT NULL,
          admissao DATE NOT NULL,
          observacoes TEXT,
          criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
          atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP
        )
        ")->execute();
    }

    public function salvar($dados)
    {
        db()->insert('vendedores')->params([
            'nome' => $dados['nome'],
            'telefone' => $dados['telefone'],
            'email' => $dados['email'],
            'cpf' => $dados['cpf'],
            'admissao' => $dados['admissao'],
            'observacoes' => $dados['observacoes']
        ])->execute();
    }

    public function listar(){
        return db()->select('vendedores')->all();
    }

    public function deletar($id)
    {
        return db()->delete('vendedores')->where('id', $id)->execute();
    }

    public function temOsVinculadas($id)
    {
        $result = db()->select('os')->where('vendedor_id', $id)->all();
        return count($result) > 0;
    }
}
