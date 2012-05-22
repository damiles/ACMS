<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="es"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<title>Acceso a la base de datos</title>
<?php
function getServerInfo()
{
	$info[]=isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
	$info[]=@strftime('%Y-%m-%d %H:%m',time());

	return implode(' ',$info);
}
?>

</head>

<body>
<div id="page">

<div id="header">
<h1>Acceso a la base de datos y otros datos</h1>
</div><!-- header-->

<div id="content">
<h2>Descripción</h2>
<p>
Para la correcta instalación de la aplicación se necesita los datos de conexión a la base de datos, usuario, password, esquema y host, que usted previamente habrá generado.
</p>

<h2>Base de datos y otros datos necesarios</h2>

<form action="install_2.php" method="post">
	<fieldset>
		<legend>Base de datos</legend>
	    <div>
	    <label for="host">Host</label><input id="host" name="host" />
	    </div><div>
	    <label for="user">User</label><input id="user" name="user" />
	    </div><div>
	    <label for="pass">Password</label><input id="pass" name="pass" />
	    </div><div>
	    <label for="database">Schema/Database</label><input id="database" name="database" />
	    </div>
	</fieldset>
	<fieldset>
		<legend>Datos del administrador</legend>
		<div>
	    <label for="admin_user">Usuario</label><input id="admin_user" name="admin_user" />
	    </div>
	    <div>
	    <label for="admin_pass">Pass</label><input id="admin_pass" name="admin_pass" />
	    </div>
	    <div>
	    <label for="admin_name">Nombre</label><input id="admin_name" name="admin_name" />
	    </div>
	    <div>
	    <label for="admin_surname">Apellidos</label><input id="admin_surname" name="admin_surname" />
	    </div>
	    <div>
	    <label for="mail">Email</label><input id="mail" name="mail" />
	    </div>
	</fieldset>
	<fieldset>
		<legend>Datos de configuración del servidor</legend>
		<div>
		    <label for="webname">Nombre del portal</label><input id="webname" name="webname" />
	    	</div>
		<div>
		    <label for="direct">Upload dir</label><input id="direct" name="direct" />
	    	</div>
    </fieldset>
    <button type="submit"  class="button">Siguiente &rArr;</button>
</form>

</div><!-- content -->

<div id="footer">
<?php echo getServerInfo(); ?>
</div><!-- footer -->

</div><!-- page -->
</body>
</html>
