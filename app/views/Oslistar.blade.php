@extends('index')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl p-6 mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Lista de Ordens de Serviço</h1>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Cliente</th>
                <th class="border px-4 py-2">Aparelho</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Os as $o)
            <tr class="hover:bg-gray-50 transition">
                <td class="border px-4 py-2">{{ $o['id'] }}</td>
                <td class="border px-4 py-2">{{ $o['cliente'] }}</td>
                <td class="border px-4 py-2">{{ $o['aparelho'] }}</td>
                <td class="border px-4 py-2">{{ $o['status'] }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="/os/exportar/{{ $o['id'] }}" 
                       class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Exportar PDF
                    </a>

                    <form action="/os/deletar/{{ $o['id'] }}" method="POST" class="inline">
                        <button type="submit"
                            onclick="return confirm('Tem certeza que deseja deletar esta OS?')"
                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Deletar
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-between pt-4">
        <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">Voltar</a>
    </div>
</div>
@endsection
