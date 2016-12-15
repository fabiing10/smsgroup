<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
 *
 * Home Router
 *
 */

Route::get('/', function()
{
	return Redirect::to('login');
});

/*
 *
 * Backend Router
 *
 */

Route::get('/login', function(){
    return View::make('backend.login');
});

Route::post('/login', array('uses'=>'AccessController@login'));
Route::get('/logout', array('uses'=>'AccessController@logout'));

Route::group(array('before' => 'auth'), function()
{

    Route::group(array('prefix' => 'files'), function()
    {
        Route::get('/adjunto/{id}', array('uses' => 'FilesController@link_adjunto','as' => 'adjuntoFile'));
    });

    //Routers Super Administrator
    Route::group(array('prefix' => 'admin','before' => 'admin_access'), function()
    {
				Route::get('/', array('uses' => 'AdminController@dashboardSuperAdmin','as' => 'dashboardSuperAdmin'));
        Route::group(array('prefix' => 'conjuntos'), function()
        {
            Route::get('/', array('uses' => 'ConjuntoController@index','as' => 'conjuntoIndex'));
            Route::get('/{id}', array('uses' => 'ConjuntoController@detallesConjunto','as' => 'detallesConjuntoIndex'));
            Route::post('/crear', array('uses' => 'ConjuntoController@store','as' => 'conjuntoStore'));
            Route::post('/eliminar', array('uses' => 'ConjuntoController@destroy','as' => 'conjuntoDestroy'));
            Route::get('/editar/{id}', array('uses' => 'ConjuntoController@edit','as' => 'conjuntoEdit'));
            Route::post('/actualizar', array('uses' => 'ConjuntoController@update','as' => 'conjuntoUpdate'));

        });

        Route::group(array('prefix' => 'administradores'), function()
        {
            Route::get('/', array('uses' => 'AdminController@index','as' => 'AdminIndex'));
            Route::post('/crear', array('uses' => 'AdminController@store','as' => 'AdminStore'));
            Route::post('/eliminar', array('uses' => 'AdminController@destroy','as' => 'AdminDestroy'));
            Route::get('/editar/{id}', array('uses' => 'AdminController@edit','as' => 'AdminEdit'));
            Route::post('/actualizar', array('uses' => 'AdminController@update','as' => 'AdminUpdate'));

        });

        Route::group(array('prefix' => 'publicidad'), function()
        {
            Route::get('/', array('uses' => 'PublicidadController@Adminindex','as' => 'AdminPublicidadIndex'));
            Route::post('/crear', array('uses' => 'PublicidadController@store','as' => 'AdminUpdate'));


        });

    });

    //Routers Super Administrator
    Route::group(array('prefix' => 'admin-conjuntos','before' => 'admin_conjuntos_access'), function(){

        Route::get('/', array('uses' => 'ConjuntoController@adminIndex','as' => 'HomeAdmin'));


        Route::group(array('prefix' => 'conjunto'), function()
        {
            Route::get('/', array('uses' => 'ConjuntoController@adminIndex','as' => 'ProfileIndex'));

            //Zona Routers
            Route::group(array('prefix' => 'zonas'), function() {

                Route::get('/', array('uses' => 'ZonaController@index','as' => 'zonaIndex'));
                Route::post('/crear', array('uses' => 'ZonaController@store','as' => 'zonaStore'));
                Route::get('/eliminar/{id}', array('uses' => 'ZonaController@destroy','as' => 'zonaDestroy'));
                Route::get('/editar/{id}', array('uses' => 'ZonaController@edit','as' => 'zonaEdit'));
                Route::post('/actualizar', array('uses' => 'ZonaController@update','as' => 'zonaUpdate'));
                Route::get('/listar', array('uses' => 'ZonaController@listarZonasConjunto','as' => 'zonaListar'));
            });

            //Apartamento Routers
            Route::group(array('prefix' => 'apartamentos'), function() {
                Route::get('/', array('uses' => 'ApartamentoController@index','as' => 'apartamentoIndex'));
                Route::post('/crear', array('uses' => 'ApartamentoController@store','as' => 'zonaStore'));
                Route::get('/eliminar/{id}', array('uses' => 'ApartamentoController@destroy','as' => 'apartamentoDestroy'));
                Route::get('/editar/{id}', array('uses' => 'ApartamentoController@edit','as' => 'zonaEdit'));
                Route::post('/actualizar', array('uses' => 'ApartamentoController@update','as' => 'zonaUpdate'));
                Route::get('/listar/{id}', array('uses' => 'ApartamentoController@listarApartamentosPorZonaId','as' => 'zonaEdit'));
                Route::get('/listar', array('uses' => 'ApartamentoController@listarApartamentosConjunto','as' => 'apartamentoListar'));
            });

            //Usuarios Routers
            Route::group(array('prefix' => 'usuarios'), function() {
                Route::get('/', array('uses' => 'UsuarioController@index','as' => 'usuarioIndex'));
                Route::post('/crear', array('uses' => 'UsuarioController@store','as' => 'usuarioStore'));
                Route::post('/eliminar', array('uses' => 'UsuarioController@destroy','as' => 'zonaDestroy'));
                Route::get('/editar/{id}', array('uses' => 'UsuarioController@edit','as' => 'zonaEdit'));
                Route::post('/actualizar', array('uses' => 'UsuarioController@actualizar','as' => 'usuarioUpdate'));
                Route::get('/listar/{id}', array('uses' => 'UsuarioController@listarId','as' => 'activarIndex'));
            });

            //Mensajes Routers
            Route::group(array('prefix' => 'mensajes'), function() {
                Route::get('/', array('uses' => 'MensajeController@adminIndex','as' => 'adminIndex'));
								Route::get('/entrantes', array('uses' => 'MensajeController@entrantesIndex','as' => 'entrantesIndex'));


								Route::get('/adjunto/{id}', array('uses' => 'MensajeController@listarAdjuntoMensajeId','as' => 'adjuntoId'));
                Route::post('/crear', array('uses' => 'MensajeController@store','as' => 'mensajeStore'));
                Route::get('/listar/{id}', array('uses' => 'MensajeController@adminListarMensajeId','as' => 'adminListarId'));
                Route::get('/reporte/{id}', array('uses' => 'MensajeController@adminListarReporteMensajeId','as' => 'adminListarReporteId'));
                Route::get('/respuestas/{id}', array('uses' => 'MensajeController@listarUsuariosRespuesta','as' => 'adminListRespuesta'));
                Route::get('/listar/respuestas/{id}', array('uses' => 'MensajeController@listarRespuestasMensajeId','as' => 'listRespuestasMensajeId'));
                Route::get('/pdf/{id}', array('uses' => 'MensajeController@pdfReporte','as' => 'pdfReporte'));
								Route::get('/entrada', array('uses' => 'MensajeController@listarMensajesUsuario','as' => 'mensajeList'));
								Route::get('/entrada/{id}', array('uses' => 'MensajeController@listarMensajeId','as' => 'mensajeListId'));
								Route::post('/responder', array('uses' => 'MensajeController@reponderMensajeId','as' => 'reponderMensajeId'));
								Route::get('/listar/respuestas/{id}', array('uses' => 'MensajeController@listarRespuestasMensajeId','as' => 'respuestasMensajeId'));

            });

            //Anuncios Routers
            Route::group(array('prefix' => 'anuncios'), function() {
                Route::get('/', array('uses' => 'AnunciosController@adminIndex','as' => 'AnuncioadminIndex'));
                Route::post('/crear', array('uses' => 'AnunciosController@store','as' => 'anuncioStore'));
                Route::get('/listar/{id}', array('uses' => 'MensajeController@adminListarMensajeId','as' => 'adminListarId'));
                Route::get('/reporte/{id}', array('uses' => 'MensajeController@adminListarReporteMensajeId','as' => 'adminListarReporteId'));

            });

						//Anuncios Routers
						Route::group(array('prefix' => 'documentos'), function() {
								Route::get('/', array('uses' => 'DocumentosController@index','as' => 'DocumentosIndex'));
								Route::post('/crear', array('uses' => 'AnunciosController@store','as' => 'anuncioStore'));
								Route::get('/listar/{id}', array('uses' => 'MensajeController@adminListarMensajeId','as' => 'adminListarId'));
								Route::get('/reporte/{id}', array('uses' => 'MensajeController@adminListarReporteMensajeId','as' => 'adminListarReporteId'));

						});

        });

    });

    //Routers User
    Route::group(array('prefix' => 'usuario','before' => 'usuario_access'), function()
    {
        Route::get('/', function()
        {
            return View::make('backend.usuarios.dashboard');
        });

        Route::get('/activar', array('uses' => 'UsuarioController@activar','as' => 'activarIndex'));

        Route::post('/actualizar', array('uses' => 'UsuarioController@actualizar','as' => 'activarIndex'));

        Route::group(array('prefix' => 'mensajes'), function()
        {
            Route::get('/', array('uses' => 'MensajeController@index','as' => 'mensajeIndex'));
            Route::get('/listar', array('uses' => 'MensajeController@listarMensajesUsuario','as' => 'mensajeList'));
            Route::get('/listar/{id}', array('uses' => 'MensajeController@listarMensajeId','as' => 'mensajeListId'));
            Route::get('/adjunto/{id}', array('uses' => 'MensajeController@listarAdjuntoMensajeId','as' => 'adjuntoId'));
            Route::post('/responder', array('uses' => 'MensajeController@reponderMensajeId','as' => 'responderMensajeId'));
            Route::get('/respuestas/{id}', array('uses' => 'MensajeController@listarRespuestasMensajeId','as' => 'respuestasMensajeId'));

						Route::post('/crear', array('uses' => 'MensajeController@guardarMensajeUsuario','as' => 'guardarMensajeUsuario'));
        });

        Route::group(array('prefix' => 'anuncios'), function()
        {
            Route::get('/', array('uses' => 'AnunciosController@index','as' => 'mensajeIndex'));
            Route::get('/listar/{id}', array('uses' => 'AnunciosController@listarAnuncioId','as' => 'anuncioId'));
        });

        Route::group(array('prefix' => 'publicidad'), function()
        {
            Route::get('/', array('uses' => 'PublicidadController@index','as' => 'publicidadIndex'));

        });




    });


});
