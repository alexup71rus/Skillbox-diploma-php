<?php
namespace Core\Model\DB;

use PDO;

/**
 *
 */
function &mysqliConnection(bool $check = false)
{
    static $connection = null;

    if ($connection === null && !$check) {
        $connection = mysqli_connect('localhost', 'root', '', 'skillbox_diploma') or die('Connection error');
    }

    return $connection;
}

/**
 *
 */
function &pdoConnection(bool $check = false)
{
    static $connection = null;

    if ($connection === null && !$check) {
        $connection = new PDO('mysql:host=localhost;dbname=skillbox_diploma', 'root', '') or die('Connection error');
    }

    return $connection;
}

/**
 *
 */
/* function pdo_close(&$connection)
{
$connection = null;
} */

////////////////////////////////////////////////////

////////////////////////////////////////////////////
//
// mysqliConnection(true) ?? mysqli_close(mysqliConnection());
// pdoConnection(true) ?? pdo_close(pdoConnection());
