<?php

if (empty($_GET)) {
    http_response_code(404);?>
    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
    <span>Page introuvable</span>  
    <script> setTimeout(() => {
        window.location = 'index.php';
    }, 5000); </script>

    <?php die();
}
if (!empty($_GET)) {  
    if (is_numeric($_GET['id'])) {
        require_once(__DIR__.'/config/database.php');
    
        $id = $_GET['id'];

        $selectCover = $db->query('SELECT cover FROM movie WHERE id='.$id);
        $result = $selectCover->fetch();
        $linkcover = $result['cover'];
        
        //supprime l'ancienne cover
        unlink(__DIR__.'/upload/cover/'.$linkcover);
            
    
        $addMovie = $db->prepare('DELETE FROM movie WHERE id = '.$id);
        $addMovie->execute();            
    
        header('Location: movie_modify_delete.php?done=0');
    }

    header('Location: movie_modify_delete.php?done=1');

}



?>