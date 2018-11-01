<?php 

function isExist(){
    require(__DIR__.'/../partials/header.php');
    http_response_code(404);?>
    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
    <span>Page introuvable</span>  
    <script> setTimeout(() => {
        window.location = 'index.php';
    }, 5000);</script>

    <?php 
    require(__DIR__.'/../partials/footer.php');
    die();
}

?>