<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

Class DefaultModel {
  public static function getDefault($default) {
    $db = Database::getInstance();

    return $db->single("SELECT defalt FROM model WHERE default = ?;", array($username), 3600);
  }
}
