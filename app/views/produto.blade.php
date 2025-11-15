@extends('index')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Cadastro de Produtos e Serviços</h1>

    <form action="/produtos/salvar" method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nome do Produto ou Serviço</label>
            <input type="text" name="nome" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none"
                placeholder="Ex: Troca de Tela, Capa de Celular, Fonte 20W">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Tipo</label>
            <select name="tipo" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none">
                <option value="">Selecione...</option>
                <option value="produto">Produto</option>
                <option value="servico">Serviço</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Descrição</label>
            <textarea name="descricao" rows="3"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none"
                placeholder="Ex: Troca de tela original Samsung com garantia de 3 meses."></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Preço (R$)</label>
            <input type="number" name="preco" step="0.01" min="0" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none"
                placeholder="Ex: 150.00">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Estoque (apenas produtos)</label>
            <input type="number" name="estoque" min="0"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none"
                placeholder="Ex: 10">
        </div>

        <div class="flex justify-between pt-4">
            <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">Voltar</a>
            <button type="submit"
                class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">Salvar</button>
        </div>
    </form>
</div>
@endsection
