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
public $config;
public $request;
public $data;
public $db;
public $views;
public $session;


/**
* Constructor
*/
protected function __construct() {
    $cw = CCowboy::Instance();
    $this->config 	= &$cw->config;
    $this->request 	= &$cw->request;
    $this->data 	= &$cw->data;
    $this->db 		= &$cw->db;
    $this->views 	= &$cw->views;
    $this->session 	= &$cw->session;
  }
  
  
  	/**
* Redirect to another url and store the session
*/
protected function RedirectTo($url) {
    $cw = CCowboy::Instance();
    if(isset($cw->config['debug']['db-num-queries']) && $cw->config['debug']['db-num-queries'] && isset($cw->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }
    if(isset($cw->config['debug']['db-queries']) && $cw->config['debug']['db-queries'] && isset($cw->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }
    if(isset($cw->config['debug']['timer']) && $cw->config['debug']['timer']) {
    	    $this->session->SetFlash('timer', $cw->timer);
    }
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }
  
  
}
