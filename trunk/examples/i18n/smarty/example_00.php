<?php
DEFINE('BASE_PATH', __DIR__.DIRECTORY_SEPARATOR);
if(file_exists(BASE_PATH.'../../../../smarty/Smarty.class.php')){
  include_once BASE_PATH.'../../../../smarty/Smarty.class.php';
}else{
  print 'PLEASE INCLUDE YOUR SMARTY CLASS IN FILE '.__FILE__.' line '.__LINE__.' AND REMOVE THE exit() STATEMENT IN LINE '.(__LINE__ + 1).PHP_EOL;
  exit();
}

//1. SETUP SMARTY AS YOU USUALLY DO, i.e. DON'T JUST COPY THE BELOW, UNLESS IT FITS YOUR NEEDS
//LOAD ALL THE MODIFIERS, FILTER, ETC. THAT YOU USE IN YOUR TEMPLATES, OTHERWISE, YOU'LL
//ENCOUNTER A LOT OF COMPILE ERRORS :D
$smarty = new \Smarty();
$smarty->setTemplateDir(BASE_PATH.'templates');
$smarty->setCompileDir(BASE_PATH.'compile');
$smarty->setCacheDir(BASE_PATH.'compile');
$smarty->setConfigDir(BASE_PATH.'compile');

//2. SOMEWHERE IN YOUR APPLICATION BEFORE THE FETCH/DISPLAY FUNCTION CALL
//   SET THE LOCALE TO USE. PROBABLY YOU ARE DOING THIS ANYWAYS ALREADY
//   IF YOU ARE USING GETTEXT IN YOUR PHP APPLICATION ALREADY
//   N.B.: for a tutorial consider http://onlamp.com/pub/a/php/2002/06/13/php.html
$language = (isset($argv[1])?trim($argv[1]):'de_DE');
putenv("LANG=$language"); 
setlocale(LC_ALL, $language);

$path = BASE_PATH.'locale';
$domain = 'messages';//this is the default text-domain
bindtextdomain($domain, $path); 
textdomain($domain);


//DONE! THE REST IST JUST FOR DEMONSTRATION PURPOSES
print $smarty->fetch('example_00.tpl');

?>
