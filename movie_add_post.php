<?php
// Traitement du formulaire
// title, description, categorie, date, iframutube, file
$title = $description = $category = $date = $iframe = $extension = $file = $link =null;

if (empty($_POST)) {
    http_response_code(404);?>
    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
    <span>Page introuvable</span>  
    <script> setTimeout(() => {
        window.location = 'index.php';
    }, 5000);</script>

    <?php die();
}
if (!empty($_POST)) {
    // Retourne l'emplacement du fichier
    $file = $_FILES['img']['tmp_name'];    
    
    // Récupère le nom du fichier
    $originalName = $_FILES['img']['name'];    
    
    // Récupère l'extension du fichier
    $extension = pathinfo($originalName)['extension'];
    
    // Renomme le fichier
    $md5 = md5($originalName.uniqid());
    $filename = $md5.'.'.$extension;    

    require_once(__DIR__.'/config/database.php');

    $title = $_POST['inputTitle'];
    $description = $_POST['inputDesc'];
    $category = $_POST['category'];
    $date = $_POST['inputDate'];
    $iframe = $_POST['inputLink'];    
    
    
    //Definir un tableau pour les erreurs
    
    $errors = [];

    // Vérifier le titre
    if (empty($title)) {
        $errors['0'] = 'errTitle=title';
    }
    // Vérifier le lien youtube    
    $link = stristr($iframe, 'src="https://www.youtube.com/');        
    //Pour insert bdd
    $iLink = substr($link, 29 ,17);        
    $link = substr($link, 13 ,22);
    $compare = $link == 'www.youtube.com/embed/'; 

    if (empty($iframe) || $compare == false) {
        $errors['1'] = 'errLink=link';
    }

    
    // Vérifier l'image
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
    $mimeType = finfo_file($finfo, $file); // ouvre le fichier et renvoie image/jpg
    $allowedExtensions = ['image/jpg','image/jpeg','image/png','image/gif'];

    if (!in_array($mimeType, $allowedExtensions)) {
        $errors['2'] = 'errImg=image';
    }

    //Vérifier la taille du fichier
    $filesize = filesize($file) / 1024;

    if ($filesize > 400) {
        $errors['2'] = 'errSize=imgSize';
    }
    
    // Vérifier la catégorie

    if (empty($category) || !in_array($category, ['1','2','3','4','5','6'])) {
        $errors['3'] = 'errCat=category';
        
    }
    // Vérifier la description
    if (empty($description)) {
        $errors['4'] = 'errDesc=description';        
    }

    // Vérifier la date    
    if (empty($date) || strtotime($date) === 'false') {
        $errors['5'] = 'errDate=date';        
    }

    if (empty($errors)) {
        
        if (isset($title) && isset($iframe) && isset($description) && is_numeric($category) && isset($extension) && isset($date)) {

            // Déplace le fichier vers un répertoire
            move_uploaded_file($file, __DIR__.'/upload/cover/'.$filename);
        
            $addMovie = $db->prepare("INSERT INTO movie (title, description, video_link, cover ,released_at, category_id) 
                                        VALUES (:title, :description, :video_link, :cover, :released_at, :category)"); 

            $addMovie->bindValue(':title', $title, PDO::PARAM_STR);
            $addMovie->bindValue(':description', $description, PDO::PARAM_STR);
            $addMovie->bindValue(':video_link', $iLink, PDO::PARAM_STR);
            $addMovie->bindValue(':cover', $filename, PDO::PARAM_STR);
            $addMovie->bindValue(':released_at', $date, PDO::PARAM_STR);
            $addMovie->bindValue(':category', $category, PDO::PARAM_INT);            
            $addMovie->execute();     
        
        
            header('Location: movie_add.php?done=1');
            
        }else{
            header('Location: movie_add.php?done=0');
        }
    }else{

        $nbrErr = $allErr = null;
        foreach ($errors as $key => $value) { 
            $nbrErr++;            
            if (count($errors) == $nbrErr) {
                $allErr = $allErr . $value;
            }else{                
                $allErr = $allErr . $value.'&';
            }
        }        
        header("Location: movie_add.php?".$allErr);
    }
    
}



?>