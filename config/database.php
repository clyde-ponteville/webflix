<?php 
    $host = 'localhost';
    $dbname = 'db_webflix';
    $user = 'root';
    $pwd = '';
    try{
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8' ,$user, $pwd,[
            //Affiche les erreur sql
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            // On récupère tous les résultats en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }catch(Exception $e){
        echo $e->getMessage();
        header('Location: https://www.google.fr/search?q='.$e->getMessage());
    }
?>