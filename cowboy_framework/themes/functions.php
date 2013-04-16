<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/
 

/**
* Print debuginformation from the framework.
*/
function get_debug() {
	//Only if debug is wanted
  $cw = CCowboy::Instance(); 
  if(empty($cw->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($cw->config['debug']['db-num-queries']) && $cw->config['debug']['db-num-queries'] && isset($cw->db)) {
    $flash = $cw->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $cw->db->GetNumQueries() . " queries.</p>";
  }
  if(isset($cw->config['debug']['db-queries']) && $cw->config['debug']['db-queries'] && isset($cw->db)) {
    $flash = $cw->session->GetFlash('database_queries');
    $queries = $cw->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }
  if(isset($cw->config['debug']['timer']) && $cw->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $cw->timer['first'], 5)*1000 . " msecs.</p>";
  }
  if(isset($cw->config['debug']['cowboy']) && $cw->config['debug']['cowboy']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CCowboy:</p><pre>" . htmlent(print_r($cw, true)) . "</pre>";
  }
  if(isset($cw->config['debug']['session']) && $cw->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CCowboy->session:</p><pre>" . htmlent(print_r($cw->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }
  return $html;
}


/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CCowboy::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
* Prepend the base_url.
*/
function base_url($url=null) {
  return CCowboy::Instance()->request->base_url . trim($url, '/');
}


/**
* Create a url to an internal resource.
*/
function create_url($url=null) {
  return CCowboy::Instance()->request->CreateUrl($url);
}


/**
* Prepend the theme_url, which is the url to the current theme directory.
*/
function theme_url($url) {
  $cw = CCowboy::Instance();
  return "{$cw->request->base_url}themes/{$cw->config['theme']['name']}/{$url}";
}


/**
* Return the current url.
*/
function current_url() {
  return CCowboy::Instance()->request->current_url;
}


/**
* Render all views.
*/
function render_views() {
  return CCowboy::Instance()->views->Render();
}
