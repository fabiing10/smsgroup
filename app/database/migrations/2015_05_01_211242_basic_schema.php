<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasicSchema extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /* #1 Create Table Usuarios */
        Schema::create('usuarios', function($table){
            $table->increments('id');
            $table->string('identificacion',30);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('genero',50);
            $table->date('fecha_nacimiento');
            $table->string('email',30);
            $table->string('telefono',20);
            $table->string('celular',20);
            $table->string('rol',20);
            $table->boolean('active');
            $table->string('facebook',20);
            $table->string('twitter',20);
            $table->string('instagram',20);
            $table->string('username',20);
            $table->string('password');
            $table->string('remember_token');
            $table->index('username');
            $table->timestamps();
        });

        /* #2 Create Table Configuraciones */
        Schema::create('configuraciones', function($table){
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            $table->boolean('notificaciones');
            $table->boolean('email_notificaciones');
            $table->string('img_perfil',50);
            $table->string('img_banner',50);
            $table->string('token');
            $table->timestamps();
        });


        /* #3 Create Table Conjuntos */
        Schema::create('conjuntos', function($table){
            $table->increments('id');
            $table->string('nit',30);
            $table->string('tipo',50);
            $table->string('nombre',50);
            $table->string('pais',50);
            $table->string('ciudad',50);
            $table->string('localidad',50);
            $table->string('barrio',50);
            $table->string('direccion',50);
            $table->string('telefono',50);
            $table->string('estrato',5);
            $table->string('map_latitud',50);
            $table->string('map_longitud',50);
            $table->string('telefono_cuadrante',20);
            $table->string('img_perfil',50);
            $table->string('banner_conjunto',50);
            $table->string('facebook',50);
            $table->string('twitter',50);
            $table->string('google',50);
            $table->string('instagram',50);
            $table->timestamps();
        });

        /* #4 Create Table Zonas */
        Schema::create('zonas', function($table){
            $table->increments('id');
            $table->integer('conjunto_id')->unsigned();
            $table->foreign('conjunto_id')
                ->references('id')->on('conjuntos')
                ->onDelete('cascade');
            $table->string('tipo',50);
            $table->string('value',10);
            $table->text('descripcion');
            $table->timestamps();
        });


        /* #5 Create Table Apartamentos */
        Schema::create('apartamentos', function($table){
            $table->increments('id');
            $table->string('apartamento',10);
            $table->text('descripcion');
            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')
                ->references('id')->on('zonas')
                ->onDelete('cascade');
            $table->index('zona_id');
            $table->timestamps();
        });


        /* #6 Create Table Usuarios Apartamento */
        Schema::create('usuario_apartamento', function($table){
            $table->increments('id');
            /* Foreign key usuarios */
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            /* Foreign key apartamentos */
            $table->integer('apartamento_id')->unsigned();
            $table->foreign('apartamento_id')
                ->references('id')->on('apartamentos')
                ->onDelete('cascade');
            $table->boolean('propietario');
            $table->timestamps();
        });


        /* #7 Create Table Administradores */
        Schema::create('administradores', function($table){
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            $table->string('rol',10);
            $table->timestamps();
        });


        /* #8 Create Table Administrador Conjunto */
        Schema::create('administrador_conjunto', function($table){
            $table->increments('id');
            $table->integer('administrador_id')->unsigned();
            $table->foreign('administrador_id')
                ->references('id')->on('administradores')
                ->onDelete('cascade');
            $table->integer('conjunto_id')->unsigned();
            $table->foreign('conjunto_id')
                ->references('id')->on('conjuntos')
                ->onDelete('cascade');
            $table->timestamps();
        });


        /* #9 Create Table Publicidad */
        Schema::create('publicidad', function($table){
            $table->increments('id');
            $table->string('tienda',30);
            $table->string('logo',50);
            $table->string('local',50);
            $table->string('titulo',50);
            $table->string('descripcion_corta',255);
            $table->text('descripcion');
            $table->string('valor',50);
            $table->date('fecha');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->string('img_publicidad',50);
            $table->string('link',50);
            $table->timestamps();
        });


        /* #10 Create Table Publicidad Conjunto */
        Schema::create('publicidad_conjunto', function($table){
            $table->increments('id');
            $table->integer('publicidad_id')->unsigned();
            $table->foreign('publicidad_id')
                ->references('id')->on('publicidad')
                ->onDelete('cascade');
            $table->integer('conjunto_id')->unsigned();
            $table->foreign('conjunto_id')
                ->references('id')->on('conjuntos')
                ->onDelete('cascade');
            $table->timestamps();
        });


        /* #11 Create Table Centro Comercial */
        Schema::create('centros_comerciales', function($table){
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('pais',50);
            $table->string('ciudad',50);
            $table->string('barrio',50);
            $table->string('direccion',50);
            $table->string('telefono',50);
            $table->text('descripcion');
            $table->string('img_perfil',50);
            $table->string('img_banner',50);
            $table->string('map_latitud',50);
            $table->string('map_longitud',50);
            $table->string('facebook',50);
            $table->string('twitter',50);
            $table->string('instagram',50);
            $table->string('google',50);
            $table->timestamps();
        });


        /* #12 Create Table Publicidad Centro Comercial */
        Schema::create('publicidad_cc', function($table){
            $table->increments('id');
            $table->integer('publicidad_id')->unsigned();
            $table->foreign('publicidad_id')
                ->references('id')->on('publicidad')
                ->onDelete('cascade');
            $table->integer('centro_comercial_id')->unsigned();
            $table->foreign('centro_comercial_id')
                ->references('id')->on('centros_comerciales')
                ->onDelete('cascade');
            $table->date('fecha');
            $table->timestamps();
        });


        /* #13 Create Table Mensajes */
        Schema::create('mensajes', function($table){
            $table->increments('id');
            $table->string('tipo',30);
            $table->string('asunto',50);
            $table->longText('mensaje');
            $table->date('fecha');
            $table->boolean('Adjunto');
            $table->string('importancia',10);
            $table->string('img_interna');
            $table->boolean('leido');
            $table->boolean('respuesta');
            $table->timestamps();
        });


        /* #14 Create Table Mensaje Usuarios */
        Schema::create('mensaje_usuario', function($table){
            $table->increments('id');
            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            $table->integer('mensaje_id')->unsigned();
            $table->foreign('mensaje_id')
                ->references('id')->on('mensajes')
                ->onDelete('cascade');
            $table->boolean('leido');
            $table->date('fecha_leido');
            $table->timestamps();
        });


        /* #15 Create Table Adjuntos */
        Schema::create('adjuntos', function($table){
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('ruta');
            $table->string('tipo',100);
            $table->string('peso',50);
            $table->date('fecha');
            $table->timestamps();
        });

        /* #16 Create Table Adjunto Mensajes */
        Schema::create('adjunto_mensaje', function($table){
            $table->increments('id');
            $table->integer('adjunto_id')->unsigned();
            $table->foreign('adjunto_id')
                ->references('id')->on('adjuntos')
                ->onDelete('cascade');
            $table->integer('mensaje_id')->unsigned();
            $table->foreign('mensaje_id')
                ->references('id')->on('mensajes')
                ->onDelete('cascade');
            $table->timestamps();
        });


        /* #17 Create Table Respuestas */
        Schema::create('respuestas', function($table){
            $table->increments('id');
            $table->integer('mensaje_id')->unsigned();
            $table->foreign('mensaje_id')
                ->references('id')->on('mensajes')
                ->onDelete('cascade');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
            $table->longText('mensaje');
            $table->date('fecha');
            $table->boolean('leido');
            $table->date('fecha_leido');
            $table->timestamps();
        });


        /* #18 Create Table Noticias */
        Schema::create('noticias', function($table){
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('mini_descripcion',255);
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('autor',50);
            $table->string('img_perfil',50);
            $table->string('img_banner',50);
            $table->string('valoracion',50);
            $table->integer('conjunto_id')->unsigned();
            $table->foreign('conjunto_id')
                ->references('id')->on('conjuntos')
                ->onDelete('cascade');
            $table->timestamps();
        });


        /* #19 Create Table Publicacion Centro Comercial */
        Schema::create('publicaciones_cc', function($table){
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('descripcion_corta',50);
            $table->text('descripcion');
            $table->string('categoria',150);
            $table->string('img_publicacion',50);
            $table->string('banner_publicacion',50);
            $table->date('fecha');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->string('link',50);
            $table->boolean('enabled');
            $table->timestamps();
        });

        /* #20 Create Table Publicacion By Centro Comercial (RelationShip) */
        Schema::create('publicacion_centrocomercial', function($table){
            $table->increments('id');
            $table->integer('cc_id')->unsigned();
            $table->foreign('cc_id')
                ->references('id')->on('centros_comerciales')
                ->onDelete('cascade');
            $table->integer('publicacion_id')->unsigned();
            $table->foreign('publicacion_id')
                ->references('id')->on('publicaciones_cc')
                ->onDelete('cascade');
            $table->timestamps();
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('adjunto_mensaje');
        Schema::dropIfExists('mensaje_usuario');
        Schema::dropIfExists('publicidad_cc');
        Schema::dropIfExists('publicidad_conjunto');
        Schema::dropIfExists('administrador_conjunto');
        Schema::dropIfExists('usuario_apartamento');
        Schema::dropIfExists('apartamentos');
        Schema::dropIfExists('zonas');
        Schema::dropIfExists('conjuntos');
        Schema::dropIfExists('administradores');
        Schema::dropIfExists('publicidad');
        Schema::dropIfExists('centros_comerciales');
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('adjuntos');
        Schema::dropIfExists('mensajes');
        Schema::dropIfExists('configuraciones');
        Schema::dropIfExists('usuarios');
	}

}
