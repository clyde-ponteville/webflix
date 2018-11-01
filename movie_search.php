<?php 
  require_once(__DIR__.'/config/database.php');
  require_once(__DIR__.'/config/function.php');



$uri = __DIR__.'/movie_add.php';
$uri = str_replace("\\", "/", $uri);

if ($_SERVER['SCRIPT_FILENAME'] != $uri) {

    $query = $_POST['search'];
    if(empty($query)){
        isExist();
    }
    $year = $_POST['year'] ?? null;
    
    if (!empty($year)) {
        $url = str_replace(" ", "%20", $query);
        $json = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=ac2312ea74ea8c4442d1091f6c30dd49&language=fr-Fr&query=".$url."&page=1&include_adult=false&year=".$year."");
    }else{
        $url = str_replace(" ", "%20", $query);        
        $json = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=ac2312ea74ea8c4442d1091f6c30dd49&language=fr-Fr&query=".$url."&page=1&include_adult=false");
    }
    
    
    $obj = json_decode($json);
    
    $idMovie = $obj->{"results"}[0]->{'id'} ?? isExist();

    

}else {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {        
        $idMovie = $_GET['id'];
    }
   
}


if (!empty($idMovie) && is_numeric($idMovie)) {
    $detailsMovie = file_get_contents("https://api.themoviedb.org/3/movie/".$idMovie."?api_key=ac2312ea74ea8c4442d1091f6c30dd49&append_to_response=videos,images&language=fr-Fr");

    $result = json_decode($detailsMovie);

    $title = $result->{"original_title"};
    $desc = $result->{"overview"};
    $cover = $result->{"poster_path"};  
    $date = $result->{"release_date"};
    $category = $result->{"genres"}[0]->{"name"};
    $linkYoutube = $result->{"videos"}->{"results"}[0]->{"key"} ?? null;
    if ($linkYoutube == null) {
        $linkYoutube = $linkYoutube;
    }else{
        $linkYoutube = ("embed/".$linkYoutube);
    }


    if ($_SERVER['SCRIPT_FILENAME'] != $uri) {
        
        $dbMovie = $db->prepare("SELECT COUNT(title) FROM movie WHERE title = :title");
        $dbMovie->bindValue(":title", $title, PDO::PARAM_STR);
        $dbMovie->execute();
    
        $result =  $dbMovie->fetch();  
        
        
        // var_dump(intval($result['COUNT(title)']));
        // var_dump($result);
    
        // var_dump($title);
        // var_dump($desc);
        // var_dump($cover);
        // var_dump($date);
        // var_dump($category);
        // var_dump($linkYoutube);    
    
    
        if (intval($result['COUNT(title)']) == 0) {
            header("Location: movie_add.php?id=".$idMovie);
        }else{
            header("Location: movie_single.php?title=".$title);
        }
    }
    
}
?>