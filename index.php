<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); ?>

    <main class="container">
        <h1>Listes des films</h1>
        <div class="row">
            <?php 
                $query = $db->query('SELECT * FROM movie');            
                $result = $query->fetchAll();
                foreach ($result as $movie) { ?>
                    <div class="col-lg-6">
                        <a href="#">
                            <div class="card mb-4 boxCard"> 
                                <div class="col-lg-5 imgSize">               
                                    <img class='card-img-top' src='upload/cover/<?= $movie['cover'] ?>' alt="">
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
