<?php
include_once 'Checker.php';
include_once '../auth/customResponses/LoginResponse.php';

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

    public static function areValidCredentials($username, $password) {
        $query = "select * from users where username=?";
        $data = Database::executeSQL($query, array($username));
        $loginResponse = new LoginResponse();
        if ($data != null && $data->rowCount() > 0) {
            foreach ($data as $row) {
                $hashedPass = hash("sha256", $password.$row['userSalt']);
                if ($row['password'] == $hashedPass) {
                    $sessionToken = Database::generateRandomToken();
                    Database::updateTokenForUser($username, $sessionToken);
                    $loginResponse->setToken($sessionToken);
                    $loginResponse->setUserRole($row['role']);
                    return $loginResponse;
                }
            }
        } else {
            return $loginResponse;
        }
        return $loginResponse;
    }

    public static function isValidTokenForUser($username, $token) {
        $query = "select token from users where username=?";
        $params = array($username);
        $data = Database::executeSQL($query, $params);
        if ($data != null && $data->rowCount() > 0) {
            foreach ($data as $row) {
                if ($token == $row['token']) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function isRoot($username) {
        $query = "select role from users where username=?";
        $params = array($username);
        $data = Database::executeSQL($query, $params);
        if ($data != null && $data->rowCount() > 0) {
            foreach ($data as $row) {
                if ($row['role'] == "root") {
                    return true;
                }
            }
        }
        return false;
    }

    private static function generateRandomToken($length=200) {
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public static function updateTokenForUser($username, $sessionToken) {
        $query = "update users set token=? where username=?";
        $params = array($sessionToken, $username);
        Database::executeSQL($query, $params);
    }

    public static function addAppUser($username, $accountType, $password) {
        $salt = self::generateRandomToken(30);
        $hashedPass = hash("sha256", $password.$salt);
        $query = "INSERT into users (username, password, role, token, userSalt) VALUES (?, ?, ?, ?, ?)";
        $params =  array($username, $hashedPass, $accountType, "", $salt);
        Database::executeSQL($query, $params);
    }
}
?>