<?php

namespace App\Models;
use Leaf\Model;

class Produto extends Model
{
    public function __construct()
    {
        // Cria a tabela se não existir
        db()->query("
        CREATE TABLE IF NOT EXISTS produtos (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          nome TEXT NOT NULL,
          tipo TEXT CHECK(tipo IN ('produto','servico')) NOT NULL,
          descricao TEXT,
          preco REAL NOT NULL,
          estoque INTEGER DEFAULT NULL,
          criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
          atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP
        )
        ")->execute();
    }
}
