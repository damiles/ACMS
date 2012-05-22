<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ProtagonistaForm extends CFormModel
{
	public $name;
	public $email;
	public $body;
	public $surname;
	public $telefono;
	public $verifyCode;
        
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name,surname, email, body, telefono', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Código de Verificación',
			'name'=>'Nombre',
			'telefono'=>'Teléfono',
			'email'=>'Correo electrónico',
			'body'=>'¿Por qué crees que puedes ser el protagonista de la semana?',
			'surname'=>'Apellidos',
		);
	}
}
