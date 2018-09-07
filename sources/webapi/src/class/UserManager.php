<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

Class UserManager {

  public static function isLogged() {
    return isset($_SESSION['id']);
  }

  public static function logout() {
    unset($_SESSION['id']);
  }

}
