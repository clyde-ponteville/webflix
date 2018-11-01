<?php 
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container-fluid d-flex flex-column p-0">    
        <?php 
            if (isset($_GET['title'])) {                
                $title = htmlspecialchars($_GET['title']);            
                
                $query = $db->prepare('SELECT * ,category.name category FROM movie 
                                        INNER JOIN category 
                                        ON movie.category_id = category.id 
                                        WHERE movie.title = :title');    
                $query->bindValue(':title', $title, PDO::PARAM_STR);   
                $query->execute();                
                $result = $query->fetch();

                $date = new DateTime($result['released_at']);
                $date = $date->format('l d F Y');
                                
                if ($result === false) {
                    http_response_code(404);?>
                    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
                    <span>Page introuvable</span>  
                    <script> setTimeout(() => {
                        window.location = 'index.php';
                    }, 5000);</script>

                    <?php die();
                }
                
                $isLocal = file_exists("upload/cover/".$result['cover']);
                    if ($isLocal == false) {
                        $cover = "https://image.tmdb.org/t/p/w500".$result['cover'];                        
                    }else{
                        $cover = "upload/cover/".$result['cover'];
                                              
                    }     
                
            }
        ?>
        <div class="video">
            <div class="container embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/<?= $result['video_link'] ?>?rel=0"></iframe>
            </div>
        </div>
        <div class="position-relative" id="bg">
        <div class="dotted-bg"></div>
            <div class="container d-flex flex-row py-4 index" >
                <div class="col-lg-4">
                    <img class="cover-single" src="<?= $cover ?>" alt="cover <?= $result['title']?>">
                </div>
                <div class="col-lg-8 boxinfo">
                    <h2 class="text-center"><?= ucfirst($result['title']) ?></h2>
                    <p class="text-center"><?= $date ?> | <?= ucfirst($result['category']) ?></p>
                    <h3 class="mt-5">Synopsis</h3>
                    <p><?= $result['description'] ?></p>
                    <div class="py-3">
                        <a class="btn btn-primary" href="index.php">Retour à la liste des films</a>
                    </div>
                </div>                
    
            </div>
        </div>
    

    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>
