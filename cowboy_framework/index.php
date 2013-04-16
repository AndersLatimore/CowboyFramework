<?php
/**
* All requests routed through here. This is an overview of what actaully happens during
* a request.
*
* @package CowboyCore
*/

// ---------------------------------------------------------------------------------------
//
// PHASE: BOOTSTRAP
//
define('COWBOY_INSTALL_PATH', dirname(__FILE__));
define('COWBOY_SITE_PATH', COWBOY_INSTALL_PATH . '/site');

require(COWBOY_INSTALL_PATH.'/src/bootstrap.php');

$cw = CCowboy::Instance();


// ---------------------------------------------------------------------------------------
//
// PHASE: FRONTCONTROLLER ROUTE
//
$cw->FrontControllerRoute();


// ---------------------------------------------------------------------------------------
//
// PHASE: THEME ENGINE RENDER
//
$cw->ThemeEngineRender();
