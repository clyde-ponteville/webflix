<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); ?>

    <main class="container">
        <h1>Ajouter un film</h1>
        <!--  video-link, cover, date de sorti,-->
        <form class="row add_movie" enctype="multipart/form-data">  

        <div class="col-lg-6 left">
          <label for="inputTitle" class="sr-only">Nom du film</label>
          <input type="text" id="inputTitle" class="form-control" placeholder="Nom du film" required autofocus>
          <label for="inputDesc" class="sr-only">Description</label>
          <textarea id="inputDesc" class="form-control" placeholder="Synopsis" required></textarea>

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
            <input type="date" id="inputDate" class="form-control" placeholder="Date de sortie" required> 

            <label for="inputLink" class="sr-only">Lien du film</label>
            <input type="text" id="inputLink" class="form-control" placeholder="Lien du film" required>

            <label for="img">Image</label>
            <input name="img" type="file" class="form-control-file">

        </div>

          <button class="btn btn-lg btn-success" type="submit">Ajouter un film</button>
          
        </form>
    </main>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
