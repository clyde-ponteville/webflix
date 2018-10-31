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


$email = $_POST['inputMail'];
$user = $_POST['inputUser'];
$pwd = $_POST['inputPwd'];
$pwdCo = $_POST['inputCoPwd'];

// Hachage de mot de passe selon l'algorithme bcrypt
$password = password_hash($pwd, PASSWORD_DEFAULT);
// Retourne true ou false si correspondance
$verify = password_verify($pwdCo, $password);

//voir si l'email existe déjà dans la bdd

if ($verify == true) {    
    $createUser = $db->prepare('INSERT INTO user (username, email, password) VALUES (:user, :email, :pwd)');
    $createUser->bindValue(':user', $user, PDO::PARAM_STR);
    $createUser->bindValue(':email', $email, PDO::PARAM_STR);
    $createUser->bindValue(':pwd', $password, PDO::PARAM_STR);
    $createUser->execute();


    header('Location: index.php?done=1');
            
        
}else{    
    header('Location: index.php?done=0');
}


?>