<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

//GLOBAL VARiABLES
global $sql,$session,$config,$pg,$view,$target,$viewpage,$msg,$status;

define("SPATH_ROOT",dirname(__FILE__));
define("DS",DIRECTORY_SEPARATOR);
define( 'SPATH_LIBRARIES',	 	SPATH_ROOT.DS.'library' );
define( 'SPATH_PLUGINS',		SPATH_ROOT.DS.'plugins'   );
define( 'SPATH_PUBLIC'	   ,	SPATH_ROOT.DS.'public' );
define( 'SPATH_MEDIA'	   ,	SPATH_ROOT.DS.'media' );
define( 'SPATH_CONFIGURATION' , SPATH_ROOT.DS.'configuration' );
define( 'SHOST_IMAGES'	   ,	SPATH_MEDIA.DS.'uploaded/' );

//Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited,"",$value);
		if (is_array($value)) {
			$$key = $value;
		}else{
			$$key = @trim($value);
		}
	}
}
if($_FILES){
		foreach($_FILES as $keyimg => $values){
			foreach($values as $key => $value){
				$$key = $value;
				}
		}

	}
//SYSTEM TIMEZONE FORMAT
date_default_timezone_set('UTC');

class JConfig {

	public $secret='22AckerMyCh77';
	public $debug = false;
	public $autoRollback= true;
	public $ADODB_COUNTRECS = false;
	private static $_instance;
	public $smsusername ="";
	public $smspassword="";
	public $smsurl="";

	public function __construct(){
	}

	private function __clone(){}

	public static function getInstance(){
	if(!self::$_instance instanceof self){
	     self::$_instance = new self();
	 }
	    return self::$_instance;
	}

}

$config = JConfig::getInstance();

//included classes
include SPATH_LIBRARIES.DS."session.Class.php";
include SPATH_PLUGINS.DS."adodb".DS."adodb.inc.php";
include SPATH_CONFIGURATION.DS."configuration.php";
include SPATH_LIBRARIES.DS."sql.php";
include SPATH_LIBRARIES.DS."cryptCls.php";
include SPATH_LIBRARIES.DS."formating.Class.php";
include SPATH_LIBRARIES.DS."pagination.Class.php";
