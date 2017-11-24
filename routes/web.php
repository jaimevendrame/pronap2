<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for \your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home.index');
});

Route::get('/cursos', function () {
    return view('Home.cursos.index');
});
Route::get('/cidades', function () {
    return view('Home.cidades.index');
});
Route::get('/certificados', function () {
    return view('Home.certificados.index');
});
Route::get('/sobre', function () {
    return view('Home.sobre.index');
});


//use pronap\Mail\KryptoniteFound;
//
//
//Route::get('/', function () {
////    \Illuminate\Support\Facades\Auth::LoginUsingId(2);
//    return view('index');
//});

Route::get('/aluno', 'AlunoController@aluno');

Route::get('/add-aluno', 'AlunoController@addAluno');
Route::post('/add-aluno', 'AlunoController@addAlunoGo');

Route::get('/add-contato', 'ContatoController@addContato');
Route::post('/add-contato', 'ContatoController@addContatoGo');


Route::get('/tst/{cell}', 'AlunoController@pesquisar');
Route::get('/editar-aluno/', 'AlunoController@editar');
Route::post('/editar-aluno/{id}', 'AlunoController@editarGo');


Route::get('/pesquisar/{cell}', 'AlunoController@pesquisar');

Route::get('/sms/{idAluno}', 'AlunoController@sms');

Route::get('/cursos-disponiveis', 'CursoController@pacote_cursos2');
//Route::get('/cursos', 'CursoController@pacote_cursos2');

Route::get('/cursos-disponiveis2', 'CursoController@pacote_cursos2');
Route::get('/cursos-disponiveis/detalhes/{id}', 'CursoController@detalhes');

Route::get('/premios', 'PremioController@premios');
Route::get('/premios-pesquisa', 'PremioController@pesquisa2');
Route::post('/premios-pesquisa', 'PremioController@pesquisa2');

Route::get('/empresas', 'EmpresaController@empresas');

Route::get('defaultsend', 'EmailController@defaultSend');


Route::get('/email', 'AlunoController@email');

Route::get('/emails', function () {
    // send an email to "batman@batcave.io"
    Mail::to('jaime.vendrame@gmail.com')->send(new KryptoniteFound);

    return view('welcome');
});

Route::get('/home', function (){
    return redirect()->route('admin.home');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){

    Auth::routes();

    Route::group(['middleware' => 'can:access-admin'], function (){

        //Roles Route
        Route::get('/role', 'painel\RoleController@index');
        Route::get('/role/cadastrar', 'painel\RoleController@cadastrar');
        Route::post('/role/cadastrar', 'painel\RoleController@cadastrarGo');
        Route::get('/role/editar/{id}', 'painel\RoleController@edit');
        Route::post('/role/editar/{id}', 'painel\RoleController@editGo');
        Route::get('/role/delete/{id}', 'painel\RoleController@delete');



//Permission Route
        Route::get('/permission', 'painel\PermissionController@index');
        Route::get('/permission/cadastrar', 'painel\PermissionController@cadastrar');
        Route::post('/permission/cadastrar', 'painel\PermissionController@cadastrarGo');
        Route::get('/permission/editar/{id}', 'painel\PermissionController@edit');
        Route::post('/permission/editar/{id}', 'painel\PermissionController@editGo');
        Route::get('/permission/delete/{id}', 'painel\PermissionController@delete');


//Permissions X RolesRoute
        Route::get('/permissionrole', 'painel\PermissionRoleController@index');
        Route::get('/permissionrole/cadastrar', 'painel\PermissionRoleController@cadastrar');
        Route::post('/permissionrole/cadastrar', 'painel\PermissionRoleController@cadastrarGo');
        Route::get('/permissionrole/editar/{id}', 'painel\PermissionRoleController@edit');
        Route::post('/permissionrole/editar/{id}', 'painel\PermissionRoleController@editGo');
        Route::get('/permissionrole/delete/{id}', 'painel\PermissionRoleController@delete');

//User Roles Route
        Route::get('/userrole', 'painel\UserRoleController@index');
        Route::get('/userrole/cadastrar', 'painel\UserRoleController@cadastrar');
        Route::post('/userrole/cadastrar', 'painel\UserRoleController@cadastrarGo');
        Route::get('/userrole/editar/{id}', 'painel\UserRoleController@edit');
        Route::post('/userrole/editar/{id}', 'painel\UserRoleController@editGo');
        Route::get('/userrole/delete/{id}', 'painel\UserRoleController@delete');



        //User Campanha Route
        Route::get('campanhas', 'painel\CampanhaController@index');
        Route::get('/campanhas/cadastrar', 'painel\CampanhaController@cadastrar');
        Route::post('/campanhas/cadastrar', 'painel\CampanhaController@cadastrarGo');
        Route::get('/campanhas/editar/{id}', 'painel\CampanhaController@edit');
        Route::post('/campanhas/editar/{id}', 'painel\CampanhaController@editGo');
        Route::get('/campanhas/delete/{id}', 'painel\CampanhaController@delete');






        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/delete/{idAluno}', 'HomeController@delete')->name('delete');
        Route::get('/show/{idAluno}', 'AlunoController@show')->name('show');
        Route::get('/sms/{idAluno}', 'AlunoController@sms')->name('sms');
        //Gestão de Cursos
        Route::get('/cursos', 'CursoController@index')->name('cursos');

        //Gestão pacotes
        Route::get('/pacote', 'PacoteController@index')->name('pacote');
        Route::get('/pacote/cadastrar', 'PacoteController@cadastrar')->name('pacote-cad');
        Route::post('/pacote/cadastrar', 'PacoteController@cadastroGo')->name('pacote-cad');
        Route::get('/pacote/editar/{id}', 'PacoteController@edit')->name('pacote-edit');
        Route::post('/pacote/editar/{id}', 'PacoteController@editGo')->name('pacote-edit');
        Route::get('/pacote/delete/{id}', 'PacoteController@delete')->name('pacote-delete');
        Route::post('/pacote/pesquisar', 'PacoteController@pesquisar')->name('pacote-pesquisa');

        //Gestão de Premios
        Route::get('/premios', 'PremioController@index')->name('premio');
        Route::get('/premios/cadastrar', 'PremioController@cadastrar')->name('premio-cad');
        Route::post('/premios/cadastrar', 'PremioController@cadastroGo')->name('premio-cad');
        Route::get('/premios/editar/{id}', 'PremioController@edit')->name('premio-edit');
        Route::post('/premios/editar/{id}', 'PremioController@editGo')->name('premio-edit');
        Route::get('/premios/delete/{id}', 'PremioController@delete')->name('premio-delete');
        Route::post('/premios/pesquisar', 'PremioeController@pesquisar')->name('premio-pesquisa');

        //Gestão de Empreas
        Route::get('/empresas', 'EmpresaController@index')->name('empresa');
        Route::get('/empresas/cadastrar', 'EmpresaController@cadastrar')->name('empresa-cad');
        Route::post('/empresas/cadastrar', 'EmpresaController@cadastroGo')->name('empresa-cad');
        Route::get('/empresas/editar/{id}', 'EmpresaController@edit')->name('empresa-edit');
        Route::post('/empresas/editar/{id}', 'EmpresaController@editGo')->name('empresa-edit');
        Route::get('/empresas/delete/{id}', 'EmpresaController@delete')->name('empresa-delete');
        Route::post('/empresas/pesquisar', 'EmpresaController@pesquisar')->name('empresa-pesquisa');

        //Gestão de Cursos
        Route::get('/cursos', 'CursoController@index')->name('cursos');
        Route::get('/cursos/cadastrar', 'CursoController@cadastrar')->name('cursos-cad');
        Route::post('/cursos/cadastrar', 'CursoController@cadastroGo')->name('cursos-cad');
        Route::get('/cursos/editar/{id}', 'CursoController@edit')->name('cursos-edit');
        Route::post('/cursos/editar/{id}', 'CursoController@editGo')->name('cursos-edit');
        Route::get('/cursos/delete/{id}', 'CursoController@delete')->name('cursos-delete');
        Route::post('/cursos/pesquisar', 'CursoController@pesquisar')->name('cursos-pesquisa');


        //Gestão de Contatos
        Route::get('/contatos', 'ContatoController@index')->name('contatos');
        Route::get('/contatos/cadastrar', 'ContatoController@cadastrar')->name('contatos-cad');
        Route::post('/contatos/cadastrar', 'ContatoController@cadastroGo')->name('contatos-cad');
        Route::get('/contatos/editar/{id}', 'ContatoController@edit')->name('contatos-edit');
        Route::post('/contatos/editar/{id}', 'ContatoController@editGo')->name('contatos-edit');
        Route::get('/contatos/delete/{id}', 'ContatoController@delete')->name('contatos-delete');
        Route::post('/contatos/pesquisar', 'ContatoController@pesquisar')->name('contatos-pesquisa');

        //Gestão de Controle de Alunos
        Route::get('/controles', 'ControleController@index')->name('controles');
        Route::get('/controles/cadastrar', 'ControleController@cadastrar')->name('controles-cad');
        Route::post('/controles/cadastrar', 'ControleController@cadastroGo')->name('controles-cad');
        Route::get('/controles/editar/{id}', 'ControleController@edit')->name('controles-edit');
        Route::post('/controles/editar/{id}', 'ControleController@editGo')->name('controles-edit');
        Route::get('/controles/delete/{id}', 'ControleController@delete')->name('controles-delete');
        Route::post('/controles/pesquisar', 'ControleController@pesquisar')->name('controles-pesquisa');


    });


});

