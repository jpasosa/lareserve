<?php
    $dbserver = "localhost";
    $dbuser = "uv5919";
    $dbpassword = "7k1wHz39H8";
     $db = "spa1";

    mysql_connect($dbserver, $dbuser, $dbpassword);
    mysql_select_db($db);

    function query($sql) {
        $resultado = mysql_query($sql);
                return $resultado;
    }
?>

