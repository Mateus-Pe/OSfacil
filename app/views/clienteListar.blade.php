@extends('index')

@section('content')
<div class="w-full max-w-7xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Lista de Clientes</h1>

    @if(isset($erro))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ $erro }}
        </div>
    @endif

    @if(isset($sucesso))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ $sucesso }}
        </div>
    @endif

    @if(count($clientes) > 0)
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">ID</th>
                        <th class="border px-4 py-2 text-left">Nome</th>
                        <th class="border px-4 py-2 text-left">Telefone</th>
                        <th class="border px-4 py-2 text-left">Email</th>
                        <th class="border px-4 py-2 text-left">Endereço</th>
                        <th class="border px-4 py-2 text-left">Observações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $cliente['id'] }}</td>
                            <td class="border px-4 py-2">{{ $cliente['nome'] }}</td>
                            <td class="border px-4 py-2">{{ $cliente['telefone'] }}</td>
                            <td class="border px-4 py-2">{{ $cliente['email'] }}</td>
                            <td class="border px-4 py-2">{{ $cliente['endereco'] }}</td>
                            <td class="border px-4 py-2">{{ $cliente['observacoes'] }}</td>
                            <td class="border px-4 py-2">
                                <form action="/cliente/deletar/{{ $cliente['id'] }}" method="POST" class="inline">
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja deletar esse cliente?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-500 mt-4">Nenhum cliente encontrado.</p>
    @endif

    <div class="flex justify-start mt-6">
        <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">Voltar</a>
    </div>
</div>
@endsection
