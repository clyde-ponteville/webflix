<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); 

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $getMovie = $db->query('SELECT * FROM movie WHERE id='.$id);
    $dataMovie = $getMovie->fetch();

    $getCategory = $db->query('SELECT * FROM category');            
    $dataCategory = $getCategory->fetchAll();

    $idCategory = $dataMovie['category_id'];
    
}

?>

    <main class="container">
        <h1>Ajouter un film</h1>
        <!--  video-link, cover, date de sorti,-->
        <form class="row add_movie" method="post" enctype="multipart/form-data" action="movie_modify_post.php" >  

        <div class="col-lg-6 left">
            <label for="inputTitle" class="sr-only">Nom du film</label>
            <input type="text" id="inputTitle" name="inputTitle" class="form-control" value="<?= ucfirst($dataMovie['title']) ?>" required autofocus>
            <label for="inputDesc" class="sr-only">Description</label>
            <textarea id="inputDesc" name="inputDesc" class="form-control" required><?= $dataMovie['description']?></textarea>

            <select class="custom-select" name="category" id="select_category" required>
            <option value="<?= $dataMovie['category_id'] ?>" selected><?= ucfirst($dataCategory[$idCategory -1]['name']) ?></option>
            <?php 
                foreach ($dataCategory as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                <?php }
            ?>
        </select>

        </div>
        <div class="col-lg-6 right">
            <label for="inputDate" class="sr-only">Nom du film</label>
            <input type="date" id="inputDate" name="inputDate" class="form-control" value="<?= $dataMovie['released_at'] ?>" required> 

            <label for="inputLink" class="sr-only">Lien iframe youtube</label>
            <input type="text" id="inputLink" name="inputLink" class="form-control" value="<?= $dataMovie['video_link'] ?>" required>

            <label for="img">Image</label>
            <input name="img" type="file" class="form-control-file" required>

        </div>

            <a class="btn btn-lg btn-primary" href="movie_modify_delete.php">Modifier un autre film</a>
            <input class="btn btn-lg btn-success" type="submit" value="Modifier le film">            


        </form>
        <?php   
//Erreur formulaire
    if (isset($_GET['errTitle']) || isset($_GET['errDate']) || isset($_GET['errCat']) || isset($_GET['errImg']) || isset($_GET['errDesc']) || isset($_GET['errSize']) || isset($_GET['errLink'])) { ?>
        <div class="bg-danger error">
            <span>Erreur: </span>
            <ul>
                <?php
                if (isset($_GET['errTitle']) == 'title') {
                    ?>
                    <li>Le nom n'est pas valide !</li>            
                <?php
                }
                if (isset($_GET['errDate']) == 'date') {
                    ?>            
                    <li>La date n'est pas valide !</li>            
                <?php
                }
                if (isset($_GET['errCat']) == 'category') {
                    ?>
                    <li>La categorie n'est pas valide !</li>
                <?php
                }
                if (isset($_GET['errImg']) == 'image') {
                    ?>
                    <li>L'image doit être au format (jpg, png, jpeg ou gif)</li>            
                <?php
                }
                if (isset($_GET['errSize']) == 'imgSize') {
                    ?>
                    <li>L'image ne doit pas dépasser 2Mo</li>            
                <?php
                }
                if (isset($_GET['errDesc']) == 'description') {
                    ?>
                    <li>La description n'est pas valide !</li>               
                <?php
                }
                if (isset($_GET['errLink']) == 'link') {
                    ?>
                    <li>L'iframe youtube n'est pas valide !</li>            
                <?php
                }?>
            </ul>
        </div>
    <?php }
        
        if (isset($_GET['done'])) {            
            $done = $_GET['done'];            
            switch ($done) {
                case '0':
                ?>
                    <div class="alert alert-danger" role="alert">
                        La pizza n'a pas été ajouté !
                    </div>
                <?php
                    break;

                case '1':
                ?>
                    <div class="alert alert-success" role="alert">
                        Votre pizza a bien été ajouté ! ☺
                    </div>
                <?php
                    break;
            }
            
        }
        

    ?>
    </main>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
