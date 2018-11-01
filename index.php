<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); 
?>

    <main class="container">
    <?php
        if (isset($_GET['done'])) {            
            $done = $_GET['done'];            
            switch ($done) {
                case '0':
                ?>
                    <div class="alert alert-danger" role="alert">
                        Votre compte n'a pas été crée !
                    </div>
                <?php
                    break;

                case '1':
                ?>
                    <div class="alert alert-success" role="alert">
                        Votre compte a bien été crée ! ☺
                    </div>
                <?php
                    break;
                case '2':
                ?>
                    <div class="alert alert-danger" role="alert">
                        Le mot de passe ou l'email est incorrect
                    </div>
                <?php
                    break;
                    
            }            
        }?>
        <h1>Listes des films</h1>
        <div class="row">
            <?php 
                $query = $db->query('SELECT * FROM movie');            
                $result = $query->fetchAll();
                foreach ($result as $movie) {
                    $isLocal = file_exists("upload/cover/".$movie['cover']);
                    if ($isLocal == false) {
                        $cover = "https://image.tmdb.org/t/p/w500".$movie['cover'];                        
                    }else{
                        $cover = "upload/cover/".$movie['cover'];
                                              
                    }                 
                    
                    ?>
                    <div class="col-lg-6">
                        <a id="boxMovie" href="movie_single.php?title=<?= $movie['title']?>">
                            <div class="card mb-4 boxCard box-shadow"> 
                                <div class="col-lg-5 imgSize">               
                                    <img class='card-img-top' src="<?= $cover ?>" alt="<?= "cover du film ".$movie['title']?>">
                                    <span class="" style= display:block></span>
                                </div>
                                <div class="col-lg-7 card-body"> 
                                    <h2 class="center"><?= ucfirst($movie['title']) ?></h2>
                                    <p class="center date"><?= $movie['released_at'] ?></p>
                                    <h3>Synopsis</h3>
                                    <p class="syno"><?= $movie['description'] ?></p>
                                    <p class="redirect">Plus d'information</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
            <?php }
            ?>
            
        </div>
    </main>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
