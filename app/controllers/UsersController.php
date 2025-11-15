<?php

namespace App\Controllers;
use App\Models\Cliente;
use App\Models\Ordem;
use App\Models\Vendedor;
use App\Models\Produto;
use Leaf\Controller;

class UsersController extends Controller
{
    public function index()
    {
        response()->render('menu');
    }

    public function cliente(){
        response()->render('cliente');
    }

    public function Clientesalvar() {
        $nome = $_POST['nome'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $email = $_POST['email'] ?? '';
        $endereco = $_POST['endereco'] ?? '';
        $observacoes = $_POST['observacoes'] ?? '';

        $cliente = new Cliente();

        $cliente->salvar([
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'endereco' => $endereco,
            'observacoes' => $observacoes
        ]);

        response()->render('menu', [
            'mensagem' => 'Cliente salvo com sucesso!'
        ]);
    }

    public function Clientelistar()
    {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->listar();

        response()->render('clienteListar', [
            'clientes' => $clientes
        ]);
    }

    public function Clientedeletar($id){
        $clienteModel = new Cliente();

        // Verifica se existem OS vinculadas
        if ($clienteModel->temOsVinculadas($id)) {
            $clientes = $clienteModel->listar();
            response()->render('clienteListar', [
                'clientes' => $clientes,
                'erro' => 'Não é possível excluir este cliente pois existem Ordens de Serviço vinculadas a ele!'
            ]);
            return;
        }

        $clienteModel->deletar($id);

        $clientes = $clienteModel->listar();
        response()->render('clienteListar', [
            'clientes' => $clientes,
            'sucesso' => 'Cliente excluído com sucesso!'
        ]);
    }

    public function vendedor(){
        response()->render('vendedor');
    }

    public function Vendedorsalvar()
    {

        $nome = $_POST['nome'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $email = $_POST['email'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $admissao = $_POST['admissao'] ?? '';
        $observacoes = $_POST['observacoes'] ?? '';

        $vendedor = new Vendedor();

        $vendedor->salvar([
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'cpf' => $cpf,
            'admissao' => $admissao,
            'observacoes' => $observacoes
        ]);

        response()->render('menu', [
            'mensagem' => 'Vendedor cadastrado com sucesso!'
        ]);
    }

    public function Vendedorlistar(){
        $vendedorModel = new Vendedor();
        $vendedores = $vendedorModel->listar();

        response()->render('Vendedorlistar', [
            'vendedores' => $vendedores
        ]);
    }

    public function Vendedordeletar($id){
        $vendedorModel = new Vendedor();

        // Verifica se existem OS vinculadas
        if ($vendedorModel->temOsVinculadas($id)) {
            $vendedores = $vendedorModel->listar();
            response()->render('Vendedorlistar', [
                'vendedores' => $vendedores,
                'erro' => 'Não é possível excluir este vendedor pois existem Ordens de Serviço vinculadas a ele!'
            ]);
            return;
        }

        $vendedorModel->deletar($id);

        $vendedores = $vendedorModel->listar();
        response()->render('Vendedorlistar', [
            'vendedores' => $vendedores,
            'sucesso' => 'Vendedor excluído com sucesso!'
        ]);
    }

    public function os(){
        $clienteModel = new Cliente();
        $vendedorModel = new Vendedor();
        $clientes = $clienteModel->listar();
        $vendedores = $vendedorModel->listar();

        response()->render('OS',[
            'clientes' => $clientes,
            'vendedores' => $vendedores
        ]);
    }

    public function Ossalvar() {
        $cliente_id = $_POST['cliente'] ?? '';
        $vendedor_id = $_POST['vendedor'] ?? '';
        $contato = $_POST['contato'] ?? '';
        $aparelho = $_POST['aparelho'] ?? '';
        $problema = $_POST['problema'] ?? '';
        $servico = $_POST['servico'] ?? '';
        $valor = $_POST['valor'] ?? 0;
        $status = $_POST['status'] ?? '';
        $data_entrada = $_POST['data_entrada'] ?? '';
        $data_saida = $_POST['data_saida'] ?? '';

        $osModel = new Ordem();

        $osModel->salvar([
            'cliente_id' => $cliente_id,
            'vendedor_id' => $vendedor_id,
            'contato' => $contato,
            'aparelho' => $aparelho,
            'problema' => $problema,
            'servico' => $servico,
            'valor' => $valor,
            'status' => $status,
            'data_entrada' => $data_entrada,
            'data_saida' => $data_saida
        ]);

        response()->render('menu', [
            'mensagem' => 'Ordem de Serviço salva com sucesso!'
        ]);
    }


    public function Oslistar(){
        $ordemModel = new Ordem();
        $Os = $ordemModel->listar();

        response()->render('Oslistar', [
            'Os' => $Os
        ]);
    }

    public function Osdeletar($id){
        $ordemModel = new Ordem();
        $ordemModel->deletar($id);
        $Os = $ordemModel->listar();
        response()->render('Oslistar', [
            'Os' => $Os
        ]);
    }

    public function OsExportarPDF($id) {
        $ordemModel = new Ordem();
    $os = $ordemModel->exportar($id);

        if (!$os) {
            response()->json(['erro' => 'Ordem não encontrada'], 404);
            return;
        }

        $html = '
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body { font-family: DejaVu Sans, sans-serif; margin: 40px; }
                h1 { text-align: center; }
                p { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                td, th { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #f2f2f2; text-align: left; }
                .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #555; }
            </style>
        </head>
        <body>
            <h1>Ordem de Serviço #' . htmlspecialchars($os['id']) . '</h1>
            <table>
                <tr><th>Cliente</th><td>' . htmlspecialchars($os['cliente']) . '</td></tr>
                <tr><th>Vendedor</th><td>' . htmlspecialchars($os['vendedor']) . '</td></tr>
                <tr><th>Contato</th><td>' . htmlspecialchars($os['contato']) . '</td></tr>
                <tr><th>Aparelho</th><td>' . htmlspecialchars($os['aparelho']) . '</td></tr>
                <tr><th>Problema</th><td>' . htmlspecialchars($os['problema']) . '</td></tr>
                <tr><th>Serviço</th><td>' . htmlspecialchars($os['servico']) . '</td></tr>
                <tr><th>Valor</th><td>R$ ' . number_format($os['valor'], 2, ',', '.') . '</td></tr>
                <tr><th>Status</th><td>' . htmlspecialchars($os['status']) . '</td></tr>
                <tr><th>Data de Entrada</th><td>' . htmlspecialchars($os['data_entrada']) . '</td></tr>
                <tr><th>Data de Saída</th><td>' . htmlspecialchars($os['data_saida']) . '</td></tr>
            </table>

            <div class="footer">
                <p>23.808.201/0001-15</p>
                <p>Gerado automaticamente pelo sistema OSFácil - ' . date('d/m/Y H:i') . '</p>
                <br>
                <br>
                <hr>
                <p> Assinatura do cliente</p>
            </div>


        </body>
        </html>
        ';

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Ordem_de_Serviço_' . $id . '.pdf', ["Attachment" => true]);
    }
}
