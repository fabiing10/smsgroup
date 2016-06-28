<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
    protected $hidden = array('password', 'remember_token');

    protected $fillable = array('nombres','apellidos','identificacion','email','fecha_nacimiento','telefono','celular','rol','username','password');


    /**
     *
     * @Relationship
     *
     **/

    // Many to many relationship Usuario-Apartamento Table
    public function apartamentos(){
        return $this->belongsToMany('Apartamento','usuario_apartamento','usuario_id','apartamento_id');
    }


    // Many to many relationship Usuario-Apartamento Table
    public function mensajes(){
        return $this->belongsToMany('Mensaje','mensaje_usuario','usuario_id','mensaje_id');
    }


    // Many to many relationship Respuestas Table
    public function respuestasMensaje(){
        return $this->belongsToMany('Mensaje','respuestas','usuario_id','mensaje_id');
    }




    public function configuracion(){
        return $this->hasOne('Configuracion');
    }

    public function administrador(){
        return $this->hasOne('Administrador');
    }


    public function obtenerUsuariosConjunto($conjunto){

        $query = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
            ->select('usuario.id','usuario.identificacion','usuario.nombres','usuario.apellidos','usuario.email','usuario.telefono','usuario.celular','zona.tipo','zona.value','apartamento.apartamento','u_a.propietario')
            ->where('conjunto.id', '=', $conjunto)
            ->get();

        return $query;
    }


    /**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
