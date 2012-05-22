<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="es"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<title>Verificación de requerimientos</title>
</head>

<body>
<div id="page">

<div id="header">
<h1>Verificación de requerimientos. Preinstalación</h1>
</div><!-- header-->

<div id="content">
<h2>Descripción</h2>
<p>
Este script verifica que la configuración de su servidor cumpla con los requerimientos
para poder ejecutar la aplicacion Web.
El mismo verifica que el servidor este corriendo una versión adecuada de PHP,
que las extensiones PHP necesarias hayan sido cargadas y que las configuraciones del archivo php.ini sean correctas. 
</p>

<h2>Resultado</h2>

<?php if($result>0): ?>
<p>Felicitaciones! Su servidor satisface todos los requerimientos.</p>
<?php elseif($result<0): ?>
<p>La configuración de su servidor satisface los requerimientos mínimos. Por favor preste atención a las advertencias listadas en el cuadro más abajo si su aplicación utiliza alguna de esas características.</p>
<a href="index.php" class="button">Volver a verificar</a>
<a href="install_1.php" class="button">Siguiente &rArr;</a>

<?php else: ?>
<p>Desafortunadamente la configuración de su servidor no satisface los requerimientos necesarios.</p>
<a href="index.php" class="button">Volver a verificar</a>
<?php endif; ?>
<p>&nbsp;</p>

<h2>Detalles</h2>

<table class="result">
<tr><th>Nombre</th><th>Resultado</th><th>Memo</th></tr>
<?php foreach($requirements as $requirement): ?>
<tr>
	<td>
	<?php echo $requirement[0]; ?>
	</td>
	<td class="<?php echo $requirement[2] ? 'passed' : ($requirement[1] ? 'failed' : 'warning'); ?>">
	<?php echo $requirement[2] ? 'ok' : 'Fallo'; ?>
	</td>
	<td>
	<?php echo $requirement[4]; ?>
	</td>
</tr>
<?php endforeach; ?>
</table>


</div><!-- content -->

<div id="footer">
<?php echo $serverInfo; ?>
</div><!-- footer -->

</div><!-- page -->
</body>
</html>