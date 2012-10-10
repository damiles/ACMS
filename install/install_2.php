<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="es"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<title>Verificando la conexi&oacute;n e instalando la base de datos</title>
<?php
$sqlErrorText = '';
$sqlErrorCode = 0;
$sqlStmt      = '';
$sqlFileToExecute = 'sqlScript.sql';

$host='';
$user='';
$pass='';
$database='';
$directory='';
$email='';
?>
	<?php
function getServerInfo()
{
	$info[]=isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
	$info[]=@strftime('%Y-%m-%d %H:%m',time());

	return implode(' ',$info);
}

function writeConfigFile(){

	global $host;
	global $user;
	global $pass;
	global $database;
	global $directory;
	global $email;
	global $webname;


	$config_sample="../protected/config/main-sample.php";
	$config_file="../protected/config/main.php";
	if (!file_exists($config_sample)){
		$sqlErrorText.="No main-sample.php file on server";
		return false;
	}
	if ( !is_writable('../protected/config/')){
		$sqlErrorText.="No writable directory protected/config/";
		return false;
	}

	$seindexdir=dirname(__FILE__)."/../seindex/";

	$mensaje=file_get_contents($config_sample);
        //Cambiar por los correspondientes

        $search=array('[DB_HOST]','[DB_SCHEMA]','[DB_USER]','[DB_PASS]','[ADMIN_EMAIL]','[UPLOAD_DIR]', '[WEBNAME]','[SEINDEX]');
        $replace=array($host, $database,  $user, $pass, $email, $directory, $webname, $seindexdir );
        $mensaje= str_replace($search, $replace, $mensaje);
        
        $configFile = file($config_sample);
        $handle= fopen($config_file,'w');
        fwrite($handle, $mensaje);

	fclose($handle);
	chmod($config_file, 0666);
	return true;

}

?>

</head>

<body>
<div id="page">

<div id="header">
<h1>Verificando la conexi&oacute;n e instalando la base de datos</h1>
</div><!-- header-->

<div id="content">



<?php    
if (isset($_POST['host'])){
	$webname = isset($_POST['webname']) ? $_POST['webname'] : '';
	$host = isset($_POST['host']) ? $_POST['host'] : '';
	$user = isset($_POST['user']) ? $_POST['user'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	$database = isset($_POST['database']) ? $_POST['database'] : '';

	/*$directory = isset($_POST['direct']) ? $_POST['direct'] : '';
	if($directory[strlen($directory)-1]!='/')
		$directory=$directory."/";*/
	$directory= dirname(__FILE__)."/../upload/";

	$email = isset($_POST['mail']) ? $_POST['mail'] : '';

	$admin_user = isset($_POST['admin_user']) ? $_POST['admin_user'] : '';
	$admin_pass = isset($_POST['admin_pass']) ? $_POST['admin_pass'] : '';
	$admin_name = isset($_POST['admin_name']) ? $_POST['admin_name'] : '';
	$admin_surname = isset($_POST['admin_surname']) ? $_POST['admin_surname'] : '';

	$con = mysql_connect($host,$user,$pass);

	echo "<h2>Verificando la conexi&oacute;n</h2>";
	if ($con !== false){
		mysql_select_db($database,$con);
		echo "<span class='passed'>Conexi&oacute;n establecida</span>";
		// Load and explode the sql file
		echo "<h2>Instalando Base de datos</h2>";

		$f = fopen($sqlFileToExecute,"r");
		$sqlFile = fread($f,filesize($sqlFileToExecute));

		$sqlArray = explode(';',$sqlFile);

		//Process the sql file by statements
		foreach ($sqlArray as $stmt) {
			if (strlen($stmt)>3){
				$result = mysql_query($stmt);
				if (!$result){
					$sqlErrorCode = mysql_errno();
					$sqlErrorText = mysql_error();
					$sqlStmt      = $stmt;
					break;
				}
			}
		}
		//Add user data
		if($sqlErrorCode == 0){
			$admin_stmt="UPDATE User SET user='".$admin_user."', password='".md5($admin_pass)."', name='".$admin_name."', surnames= '".$admin_surname."', email='".$mail."' WHERE idUser=1;";
			$result=mysql_query($admin_stmt);
			if (!$result){
				$sqlErrorCode = mysql_errno();
				$sqlErrorText = mysql_error();
				$sqlStmt      = $admin_stmt;
			}
		}
		echo '<table width="100%">';
		if ($sqlErrorCode == 0){
			//Write config file
			if(writeConfigFile())
				echo "<tr><td class='passed'>Installation was finished succesfully!</td></tr>";
			else
				echo "<tr><td class='warning'>An error occured when writting config file, you can change it manually.<br/>$sqlErrorText</td></tr>";
		} else {
			writeConfigFile();
			echo "<tr><td class='failed'>An error occured during installation!</td></tr>";
			echo "<tr><td class='failed'>Error code: $sqlErrorCode</td></tr>";
			echo "<tr><td class='failed'>Error text: $sqlErrorText</td></tr>";
			echo "<tr><td class='failed'>Statement:<br/> $sqlStmt</td></tr>";

		}
		echo '</table>';

	}else{
		echo "<span class='failed'>Error en la conexi&oacute;n</span>";
	}

}

?>


</div><!-- content -->

<div id="footer">
<?php echo getServerInfo(); ?>
</div><!-- footer -->

</div><!-- page -->
</body>
</html>
