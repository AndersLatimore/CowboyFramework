<?php
/**
 * Standard controller layout.
 * 
 * @package CowboyCore
 */
class CCIndex implements IController {

  /**
    * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {  
    global $cw;
    $cw->data['title'] = "The Index Controller";
    $cw->data['main'] = "<h1>The Index Controller</h1>";
  }

}
