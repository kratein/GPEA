<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

Class DefaultController {

  public static function index() {
    $template = new Template('root', 'template');
    $template->render();
  }

}
