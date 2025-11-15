@extends('index')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Cadastro de Cliente</h1>

    <form action="/cliente/salvar" method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nome completo *</label>
            <input type="text" name="nome" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Ex: João Silva">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Telefone / WhatsApp *</label>
            <input type="text" name="telefone" required
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Ex: (15) 99888-7766">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">E-mail</label>
            <input type="email" name="email"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Ex: joao@email.com">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Endereço</label>
            <input type="text" name="endereco"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Rua, número, bairro">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Observações</label>
            <textarea name="observacoes" rows="3"
                class="w-full border-gray-300 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Ex: Cliente trouxe celular com tela quebrada..."></textarea>
        </div>

        <div class="flex justify-between pt-4">
            <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">Voltar</a>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Salvar</button>
        </div>
    </form>
</div>
@endsection
