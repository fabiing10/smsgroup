<?php
/**
 * Created by PhpStorm.
 * User: FabianDeveloper
 * Date: 10/27/14
 * Time: 9:48 PM
 */


class GeneralTableSeeder extends Seeder {

    /**
     * Run the church table seeds.
     *
     * @return void
     */

    public function run()
    {

        Usuario::create( array(
            'identificacion'  => '1013636219',
            'nombres'  => 'Administrador',
            'apellidos'  => 'General',
            'fecha_nacimiento' => '1992-11-07',
            'email'  => 'fabian@g12media.net',
            'telefono'  => '3870102',
            'celular'  => '3143666151',
            'rol'  => 'super-admin',
            'username'  => 'admin',
            'password'  =>  Hash::make("1013636219")
        ));



    }
}