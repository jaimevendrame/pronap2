<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
//    \Illuminate\Support\Facades\Auth::LoginUsingId(2);
    return view('index');
});

Route::get('/aluno', 'AlunoController@aluno');

Route::get('/add-aluno', 'AlunoController@addAluno');
Route::post('/add-aluno', 'AlunoController@addAlunoGo');


Route::get('/tst/{cell}', 'AlunoController@pesquisar');
Route::get('/editar-aluno/', 'AlunoController@editar');
Route::post('/editar-aluno/{id}', 'AlunoController@editarGo');


Route::get('/pesquisar/{cell}', 'AlunoController@pesquisar');

Route::get('/sms/{idAluno}', 'AlunoController@sms');

Route::get('/cursos-disponiveis', 'AlunoController@cursos');

Route::get('/premios', 'PremioController@premios');

Route::get('/empresas', 'EmpresaController@empresas');


Route::get('/home', function (){
    return redirect()->route('admin.home');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){

    Auth::routes();

    Route::group(['middleware' => 'can:access-admin'], function (){

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/delete/{idAluno}', 'HomeController@delete')->name('delete');
        Route::get('/show/{idAluno}', 'AlunoController@show')->name('show');
        Route::get('/sms/{idAluno}', 'AlunoController@sms')->name('sms');
        //Gestão de Cursos
        Route::get('/curso', 'CursoController@index')->name('curso');

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


    });


});

