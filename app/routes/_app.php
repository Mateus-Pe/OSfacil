<?php
use App\Models\Ordem;

app()->get('/', 'UsersController@index');

app()->get('/cliente', "UsersController@cliente");
app()->post('/cliente/salvar', "UsersController@Clientesalvar");
app()->get('/cliente/listar', "UsersController@ClienteListar");
app()->post('/cliente/deletar/{id}', "UsersController@Clientedeletar");

app()->get('/vendedor', "UsersController@vendedor");
app()->post('/vendedor/salvar', "UsersController@Vendedorsalvar");
app()->get('/vendedor/listar', "UsersController@Vendedorlistar");
app()->post('/vendedor/deletar/{id}', "UsersController@Vendedordeletar");

app()->get('/produto', "UsersController@produto");

app()->get('/os', "UsersController@os");
app()->post('/os/salvar', "UsersController@Ossalvar");
app()->get('/os/listar', "UsersController@Oslistar");
app()->get('/os/exportar/{id}', 'UsersController@OsExportarPDF');
app()->post('/os/deletar/{id}', 'UsersController@Osdeletar');
