<?php 
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container-fluid d-flex flex-column p-5">    
        <?php 
                
                $query = $db->prepare('SELECT *,movie.id idMovie ,category.name category FROM movie 
                                        INNER JOIN category 
                                        ON movie.category_id = category.id');    
                
                $query->execute();                
                $result = $query->fetchAll();
                
                if ($result === false) {
                    http_response_code(404);?>
                    <h2 class='mt-5'>404 - Redirection dans 5 secondes</h2>
                    <span>Page introuvable</span>  
                    <script> setTimeout(() => {
                        window.location = 'index.php';
                    }, 5000);</script>

                    <?php die();
                } ?>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titre</th>
                        <th class="thsize" scope="col">Description</th>
                        <th scope="col">Lien video</th>
                        <th scope="col">cover</th>
                        <th scope="col">Date de sortie</th>
                        <th scope="col">Catégories</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>

                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($result as $movie) { ?>
                            <tr>
                                <th scope="row"><?= $movie['title']?></th>
                                <td><?= $movie['description']?></td>
                                <td><?= $movie['video_link']?></td>
                                <td><?= $movie['cover']?></td>
                                <td><?= $movie['released_at']?></td>
                                <td><?= $movie['category']?></td>
                                <td>
                                    <a class="badge badge-primary" href="movie_modify.php?id=<?= $movie['idMovie'] ?>">Modifier</a>
                                </td>
                                <td><a class="badge badge-danger" href="">Supprimer</a></td>

                            </tr>
                            
                <?php } ?>
                    </tbody>
                </table>
    

    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>
