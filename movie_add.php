<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); 
require_once(__DIR__.'/movie_search.php');

// $title, $desc,  $cover : https://image.tmdb.org/t/p/w500/bXs0zkv2iGVViZEy78teg2ycDBm.jpg ,$date, $category,  $linkYoutube
?>
    <main class="container">
    <?php if (!empty($_SESSION)) {
        global $category;
        $getCategory = $db->query('SELECT id FROM category WHERE name = '. $db->quote($category));            
        $dataCategory = $getCategory->fetch();
        $idCategory = $dataCategory['id'];
        
        ?>
        <h1>Ajouter un film</h1>
        <!--  video-link, cover, date de sorti,-->
        <form class="row add_movie" method="post" enctype="multipart/form-data" action="movie_add_post.php" >  

        <div class="col-lg-6 left">
            <label for="inputTitle" class="sr-only">Nom du film</label>
            <input type="text" id="inputTitle" name="inputTitle" class="form-control" placeholder="Nom du film" required autofocus value="<?= $title ?? "" ?>">
            <label for="inputDesc" class="sr-only">Description</label>
            <textarea id="inputDesc" name="inputDesc" class="form-control" placeholder="Synopsis" required><?= $desc ?? "" ?></textarea>

            <select class="custom-select" name="category" id="select_category" required>
            <option>Choisissez la categorie</option>
            <?php 
                $getCategory = $db->query('SELECT * FROM category');            
                $dataCategory = $getCategory->fetchAll();
                
                 foreach ($dataCategory as $category) { 
                    if ($category['id'] === $idCategory) { ?>
                        <option selected value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                <?php
                    } else{  
                ?>
                    <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                <?php
                    } 
                }
            ?>
        </select>

        </div>
        <div class="col-lg-6 right">
            <label for="inputDate" class="sr-only">Date de sortie</label>
            <input type="date" id="inputDate" name="inputDate" class="form-control" placeholder="Date de sortie" required value="<?= $date ?? "" ?>"> 

            <label for="inputLink" class="sr-only">Lien iframe youtube</label>
            <input type="text" id="inputLink" name="inputLink" class="form-control" placeholder="Lien iframe youtube" required value="<?= ($linkYoutube) ?? "" ?>">
            
            <?php   
                if (!empty($cover)) { ?>
                    
                    <label for="urlImg">L'image sera une url internet</label>
                    <input name="imgCover" type="text" class="form-control" style="display:none;" value="<?= $cover ?>">
                <?php }else{ ?>

                    <label for="img">Image</label>
                    <input name="img" type="file" class="form-control-file" required>

                <?php }
            
            ?>


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
                        Votre film n'a pas été ajouté !
                    </div>
                <?php
                    break;

                case '1':
                ?>
                    <div class="alert alert-success" role="alert">
                        Votre film a bien été ajouté ! ☺
                    </div>
                <?php
                    break;
            }
            
        }
        

    }else{
    http_response_code(404);?>
    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
    <span>Page introuvable</span>  
    <script> setTimeout(() => {
        window.location = 'index.php';
    }, 5000); </script>

    <?php die();
}
?>
    </main>



<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
