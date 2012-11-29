<?php /* Smarty version Smarty-3.1.11, created on 2012-11-29 21:48:10
         compiled from "/sw/www/vp.servenergy.de/lib/mebb/examples/i18n/smarty/templates/example_00.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11968169350b7ca0a343075-21732921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '966320da93e354b8cbf434165ce3cd0faa2eecce' => 
    array (
      0 => '/sw/www/vp.servenergy.de/lib/mebb/examples/i18n/smarty/templates/example_00.tpl',
      1 => 1354128543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11968169350b7ca0a343075-21732921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b7ca0a379596_02976113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b7ca0a379596_02976113')) {function content_50b7ca0a379596_02976113($_smarty_tpl) {?>Almost nothing to do, but 'gettexting' your way :). 

When can you use this example?
  -- if you bind/set your text-domain from within your PHP application 
  -- if you just use ONE text-domain for ALL TEMPLATES (does not matter if you have multiple for the rest of your PHP application)
  -- if you make sure that the right textdomain is set and bound when you call fetch/display the template

RUNNING THE EXAMPLE:
php example_00.php [locale]

<?php echo gettext("This is my first translation message");?>

<?php echo substr(gettext("This is my yet another translation message with a custom modifier"),0,60);?>

<?php echo sprintf(ngettext("%d comment","%d comments",1),1);?>

<?php echo sprintf(ngettext("%d comment","%d comments",0),0);?>

<?php echo sprintf(ngettext("%d comment","%d comments",10),10);?>

<?php }} ?>