<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

Class Util {
  public static function isAjaxRequest($REQUEST) {
    return (!empty($REQUEST['HTTP_X_REQUESTED_WITH']) && strtolower($REQUEST['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
  }
}
