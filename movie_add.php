<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); ?>

    <main class="container">
        <h1>Ajouter un film</h1>
        <!--  video-link, cover, date de sorti,-->
        <form class="row add_movie" method="post" enctype="multipart/form-data" action="movie_add_post.php" >  

        <div class="col-lg-6 left">
            <label for="inputTitle" class="sr-only">Nom du film</label>
            <input type="text" id="inputTitle" name="inputTitle" class="form-control" placeholder="Nom du film" required autofocus>
            <label for="inputDesc" class="sr-only">Description</label>
            <textarea id="inputDesc" name="inputDesc" class="form-control" placeholder="Synopsis" required></textarea>

            <select class="custom-select" name="category" id="select_category" required>
            <option selected>Choisissez la categorie</option>
            <?php 
                $getCategory = $db->query('SELECT * FROM category');            
                $dataCategory = $getCategory->fetchAll();

                foreach ($dataCategory as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                <?php }
            ?>
        </select>

        </div>
        <div class="col-lg-6 right">
            <label for="inputDate" class="sr-only">Nom du film</label>
            <input type="date" id="inputDate" name="inputDate" class="form-control" placeholder="Date de sortie" required> 

            <label for="inputLink" class="sr-only">Lien iframe youtube</label>
            <input type="text" id="inputLink" name="inputLink" class="form-control" placeholder="Lien iframe youtube" required>

            <label for="img">Image</label>
            <input name="img" type="file" class="form-control-file" required>

        </div>

            <input class="btn btn-lg btn-success m-3" type="submit" value="Ajouter un film">

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
