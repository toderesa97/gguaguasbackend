<?php
include_once 'Checker.php';

class Database {

    private static $pdo = null;

    public static function createDatabaseInstance() {
        try {
            if (Database::$pdo == null) {
                Database::$pdo = new PDO( 'mysql:host=127.0.0.1:3306;dbname=gguaguas',
                    'root',
                    '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES, false));
                Database::$pdo->exec("set names utf8");
            }
        } catch(Exception $e) {
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }

    public static function executeSQL($query, $arrayOfParams=null) {
        if (Database::$pdo == null) {
            return null;
        }
        $queryToIssue = Database::$pdo->prepare($query);
        $queryToIssue->execute($arrayOfParams);
        return $queryToIssue;
    }

    public static function existsUniqueKeyValueOn($table, $uniqueKeyFieldName, $value) {
        $query = "select * from $table where $uniqueKeyFieldName='$value';";
        $info = Database::executeSQL($query);
        if ($info->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
?>