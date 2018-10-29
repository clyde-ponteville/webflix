# WebFlix

On veux créer un nouveau Netflix.

Projet:
- Créer un dépot github
- Faire le lien entre le dpôt local
- Penser à la BDD

Pages:
--- PARTIE 1 ---
- Accueil -> Liste de films triée par catégorie

- Voir un film(movie_single.php?id=4) -> On peut voir un film
- Ajouter un film (movie_add.php) -> On peut ajouté un film

--- PARTIE 2 ---
- Modifier un film (movie_edit.php?id=4) -> On peut modifié un film
- Supprimer un film (movie_delete.php?id=4) -> On peut supprimé un film. On doit avoir un bouton supprimer sur la liste des films
on clique, on supprime le film en question et on revient sur la liste
- Film random (movie_random.php) -> On affiche 4 films aléatoires

--- PARTIE 3 ---
- Inscritption (register.php) -> Formulaire d'inscription (email, username, mot de passe, confirmer le mot de passe)
- Connexion (login.php) -> Formulaire de connexion (email, mot de passe)

--- PARTIE 4 ---
Les pages Voir, Ajouter, Modif, Suppr un film ne sont accessible que par quelq'un qui est connecté.

--- PARTIE 5 ---
- Mot de passe oublié (forget.php) -> 1er formulaire où on saisit l'email, s'il existe, in envoie un lien à l'utilisateur 
par mail pour redéfinir son mot de passe. Ce lien doit être unique et optionnellement valide seulement 24h(sinon 404).
Si le lien est valide, on arrive sur un 2ème formulaire où on redéfinit son mot de passe (nouveau mdp, confirm mdp)


Structure:

BDD:
- Movie : id, title, description, video_link, cover, released_at, category_id
- Category: id, name
- User: id, username, email, password, token, token_expiration
