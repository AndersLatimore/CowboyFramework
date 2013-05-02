<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/**
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);


/**
* Set what to show as debug or developer information in the get_debug() theme helper.
*/
$cw->config['debug']['cowboy'] = false;
$cw->config['debug']['session'] = false;
$cw->config['debug']['timer'] = true;
$cw->config['debug']['db-num-queries'] = true;
$cw->config['debug']['db-queries'] = true;


/**
* Set database(s).
*/
$cw->config['database'][0]['dsn'] = 'sqlite:' . COWBOY_SITE_PATH . '/data/.ht.sqlite';


/**
* What type of urls should be used?
*
* default = 0 => index.php/controller/method/arg1/arg2/arg3
* clean = 1 => controller/method/arg1/arg2/arg3
* querystring = 2 => index.php?q=controller/method/arg1/arg2/arg3
*/
$cw->config['url_type'] = 1;


/**
* Set a base_url to use another than the default calculated
*/
$cw->config['base_url'] = null;


/**
* How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
*/
$cw->config['hashing_algorithm'] = 'sha1salt';


/**
* Allow or disallow creation of new user accounts.
*/
$cw->config['create_new_users'] = true;


/**
* Define session name
*/
$cw->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$cw->config['session_key'] = 'cowboy';


/**
* Define server timezone
*/
$cw->config['timezone'] = 'Europe/Stockholm';


/**
* Define internal character encoding
*/
$cw->config['character_encoding'] = 'UTF-8';


/**
* Define language
*/
$cw->config['language'] = 'en';


/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example:
* the url 'developer/dump' would instantiate the controller with the key "developer", that is
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $cw->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
$cw->config['controllers'] = array(
  'index' => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog' => array('enabled' => true,'class' => 'CCBlog'),
  'page' => array('enabled' => true,'class' => 'CCPage'),
  'user' => array('enabled' => true,'class' => 'CCUser'),
  'acp' => array('enabled' => true,'class' => 'CCAdminControlPanel'),
);


/**
* Settings for the theme.
*/
$cw->config['theme'] = array(
  'name' => 'grid', // The name of the theme in the theme directory
  'stylesheet' => 'style.php', // Main stylesheet to include in template files
  'template_file' => 'index.tpl.php', // Default template file, else use default.tpl.php
  // A list of valid theme regions
  'regions' => array('flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  // Add static entries for use in the template file.
  'data' => array(
    'header' => 'Cowboy',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo_80x80.png',
    'logo' => 'logo_80x80.png',
    'logo_width' => 80,
    'logo_height' => 80,
    'footer' => '<p>Cowboy &copy; by Anders Akesson (andy_akesson@me.com)</p>',
  ),
);
