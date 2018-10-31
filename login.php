<?php
    require_once(__DIR__.'/config/database.php');

if (empty($_POST)) {
    http_response_code(404);?>
    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
    <span>Page introuvable</span>  
    <script> setTimeout(() => {
        window.location = 'index.php';
    }, 5000); </script>

    <?php die();
}


$email = $_POST['mailAdress'];
$pwd = $_POST['pwdConnect'];



    if (isset($email) && isset($pwd)) {        
        $user = $db->prepare('SELECT * FROM user WHERE email = :email');
        $user->bindValue(':email', $email, PDO::PARAM_STR);
        $user->execute();    
        $result = $user->fetch();        
        
        $dbEmail = $result['email'];
        $dbPwd = $result['password'];
        
        $verify = password_verify($pwd, $dbPwd); 
        
        if ($dbEmail == $email && $verify == true) {            
            session_start(); 
            $_SESSION['user'] = $result['username'];
            
        
            header('Location: index.php');
        }else{    
            header('Location: index.php?done=2');        
        }    
    }





?>