@extends('index')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 p-6 flex flex-col justify-between">
        <div class="flex flex-col items-start space-y-4">
            <svg class="h-12 w-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20H4v-2a4 4 0 0 1 3-3.87M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-900">Clientes</h2>
            <div class="flex flex-col w-full space-y-2">
                <a href="/cliente" class="w-full px-4 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 transition text-center">Cadastrar</a>
                <a href="/cliente/listar" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-sm hover:bg-gray-300 transition text-center">Listar</a>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 p-6 flex flex-col justify-between">
        <div class="flex flex-col items-start space-y-4">
            <svg class="h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A7.963 7.963 0 0 1 12 15c2.21 0 4.21.896 5.879 2.343M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-900">Vendedores</h2>
            <div class="flex flex-col w-full space-y-2">
                <a href="/vendedor" class="w-full px-4 py-2 bg-green-600 text-white rounded-sm hover:bg-green-700 transition text-center">Cadastrar</a>
                <a href="/vendedor/listar" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-sm hover:bg-gray-300 transition text-center">Listar</a>
            </div>
        </div>
    </div>

    <!-- <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 p-6 flex flex-col justify-between">
        <div class="flex flex-col items-start space-y-4">
            <svg class="h-12 w-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 7v14h18V7M3 7l9 6 9-6"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-900">Produtos/Serviços</h2>
            <div class="flex flex-col w-full space-y-2">
                <a href="/produto" class="w-full px-4 py-2 bg-purple-600 text-white rounded-sm hover:bg-purple-700 transition text-center">Cadastrar</a>
                <a href="/produtos/listar" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-sm hover:bg-gray-300 transition text-center">Listar</a>
            </div>
        </div>
    </div> -->

    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 p-6 flex flex-col justify-between">
        <div class="flex flex-col items-start space-y-4">
            <svg class="h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 4H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2z"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-900">Ordens de Serviço</h2>
            <div class="flex flex-col w-full space-y-2">
                <a href="/os" class="w-full px-4 py-2 bg-red-600 text-white rounded-sm hover:bg-red-700 transition text-center">Cadastrar</a>
                <a href="/os/listar" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-sm hover:bg-gray-300 transition text-center">Listar</a>
            </div>
        </div>
    </div>
</div>
@endsection
