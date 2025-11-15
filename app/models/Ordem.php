<?php

namespace App\Models;
use Leaf\Model;
use Dompdf\Dompdf;

class Ordem extends Model
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
            CREATE TABLE IF NOT EXISTS os (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                contato TEXT NOT NULL,
                aparelho TEXT NOT NULL,
                problema TEXT NOT NULL,
                servico TEXT,
                valor REAL,
                status TEXT,
                data_entrada DATE,
                data_saida DATE,
                criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ")->execute();


        try {
            db()->query("ALTER TABLE os ADD COLUMN cliente_id INTEGER")->execute();
        } catch (\Exception $e) {

        }

        try {
            db()->query("ALTER TABLE os ADD COLUMN vendedor_id INTEGER")->execute();
        } catch (\Exception $e) {

        }
    }

    public function salvar($dados)
    {
        db()->insert('os')->params([
            'cliente_id' => $dados['cliente_id'],
            'vendedor_id' => $dados['vendedor_id'],
            'contato' => $dados['contato'],
            'aparelho' => $dados['aparelho'],
            'problema' => $dados['problema'],
            'servico' => $dados['servico'],
            'valor' => $dados['valor'],
            'status' => $dados['status'],
            'data_entrada' => $dados['data_entrada'],
            'data_saida' => $dados['data_saida']
        ])->execute();
    }


    public function listar()
    {
        return db()->query("
            SELECT 
                os.id,
                clientes.nome AS cliente,
                vendedores.nome AS vendedor,
                os.aparelho,
                os.status
            FROM os
            LEFT JOIN clientes ON clientes.id = os.cliente_id
            LEFT JOIN vendedores ON vendedores.id = os.vendedor_id
            ORDER BY os.id DESC
        ")->all();
    }

    public function deletar($id)
    {
        return db()->delete('os')->where('id', $id)->execute();
    }

    public static function exportar($id)
{
    return db()
        ->query("
            SELECT 
                os.*,
                clientes.nome AS cliente,
                vendedores.nome AS vendedor
            FROM os
            LEFT JOIN clientes ON clientes.id = os.cliente_id
            LEFT JOIN vendedores ON vendedores.id = os.vendedor_id
            WHERE os.id = $id
        ")
        ->first();
}


}
