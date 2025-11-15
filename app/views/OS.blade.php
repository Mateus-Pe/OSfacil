@extends('index')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Cadastro de Ordem de Serviço</h1>

    <form action="/os/salvar" method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Cliente *</label>
            <select name="cliente" required class="border rounded p-2 w-full">
                <option value="">Selecione o cliente...</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente['id'] }}">{{ $cliente['nome'] }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Vendedor *</label>
            <select name="vendedor" required class="border rounded p-2 w-full">
                <option value="">Selecione o vendedor...</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor['id'] }}">{{ $vendedor['nome'] }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label class="block text-gray-700 font-medium mb-1">Contato *</label>
            <input type="text" name="contato" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none"
                placeholder="Ex: (15) 98877-6655">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Aparelho *</label>
            <input type="text" name="aparelho" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none"
                placeholder="Ex: Samsung Galaxy A30">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Problema Relatado *</label>
            <textarea name="problema" rows="3" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none"
                placeholder="Ex: Tela quebrada e não liga."></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Serviço Executado</label>
            <textarea name="servico" rows="3"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none"
                placeholder="Ex: Troca de tela e atualização de software."></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Valor Total (R$) *</label>
                <input type="number" name="valor" step="0.01" min="0" required
                    class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none"
                    placeholder="Ex: 250.00">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Status *</label>
                <select name="status" required
                    class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none">
                    <option value="">Selecione...</option>
                    <option value="aberta">Aberta</option>
                    <option value="em_andamento">Em andamento</option>
                    <option value="finalizada">Finalizada</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Data de Entrada *</label>
            <input type="date" name="data_entrada" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Data de Saída</label>
            <input type="date" name="data_saida"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none">
        </div>

        <div class="flex justify-between pt-4">
            <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">Voltar</a>
            <button type="submit"
                class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Salvar</button>
        </div>
    </form>
</div>
@endsection
