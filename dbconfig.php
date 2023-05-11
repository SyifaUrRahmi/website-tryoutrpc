<?php

    try {

        $con = new PDO('mysql:host=localhost;dbname=u1579522_tryoutrpc', 'u1579522_Sy1f4', '30M1424h_Sy1f4', array(PDO::ATTR_PERSISTENT => true));
    } catch (PDOException $e) {

        echo $e->getMessage();
    }

    include_once 'AuthClass.php';

    $user = new Auth($con);
