<?php
/**
* Holding a instance of CCowboy to enable use of $this in subclasses.
*
* @package CowboyCore
*/
class CObject {

/**
* Members
*/
protected $cw;
protected $config;
protected $request;
protected $data;
protected $db;
protected $views;
protected $session;
protected $user;


/**
* Constructor, can be instantiated by sending in the $ly reference.
*/
protected function __construct($cw=null) {
if(!$cw) {
$cw = CCowboy::Instance();
}
    $this->cw		= &$cw;
    $this->config 	= &$cw->config;
    $this->request 	= &$cw->request;
    $this->data 	= &$cw->data;
    $this->db 		= &$cw->db;
    $this->views 	= &$cw->views;
    $this->session 	= &$cw->session;
    $this->user 	= &$cw->user;
}


	/**
* Wrapper for same method in CCowboy. See there for documentation.
*/
protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->cw->RedirectTo($urlOrController, $method, $arguments);
  }


/**
* Wrapper for same method in CCowboy. See there for documentation.
*/
protected function RedirectToController($method=null, $arguments=null) {
    $this->cw->RedirectToController($method, $arguments);
  }


/**
* Wrapper for same method in CCowboy. See there for documentation.
*/
protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->cw->RedirectToControllerMethod($controller, $method, $arguments);
  }


/**
* Wrapper for same method in CCowboy. See there for documentation.
*/
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->cw->AddMessage($type, $message, $alternative);
  }


/**
* Wrapper for same method in CCowboy. See there for documentation.
*/
protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->cw->CreateUrl($urlOrController, $method, $arguments);
  }


}

