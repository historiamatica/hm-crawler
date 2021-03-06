<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Humatica - L'histoire à l'Ère du numérique</title>
	<meta name="description" content="Humatica est un portail pour les humanités numériques et pour la démocratisation du savoir dans les sciences humaines et sociales."> 
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="res/app.css">

</head>
<body>
	<nav class="sideNav">
		<a href="#" class="btnMenu"><div class="btnMenuLabel">Accueil</div><div class="btnMenuIcone"><i class="i64">home</i></div></a>
		<a href="#" class="btnMenu"><div class="btnMenuLabel">Articles</div><div class="btnMenuIcone"><i class="i64">article</i></div></a>
		<a href="#" class="btnMenu"><div class="btnMenuLabel">Projets</div><div class="btnMenuIcone"><i class="i64">insights</i></div></a>
		<a href="#" class="btnMenu"><div class="btnMenuLabel">Globe</div><div class="btnMenuIcone"><i class="i64">public</i></div></a>
		<a href="#" class="btnMenu"><div class="btnMenuLabel">Médias</div><div class="btnMenuIcone"><i class="i64">movie</i></div></a>
		<a href="#" class="btnEnd"><div class="btnMenuLabel">Aide</div><div class="btnMenuIcone"><i class="i64">help</i></div></a>
	</nav>
	<main>
		<nav class="topNav">
			<a href="#">Réalisations</a>
			<a href="#">Services</a>
			<a href="#">Confidentialité</a>
			<a href="#">À propos</a>
		</nav>
		<section class="moduleRecherche">
			<img src="img/logo.png" alt="logo" height="75">
			<form action="recherche.php" method="post">
				<input id="barreRecherche" type="text" placeholder="Recherche">
				<button id="btnRecherche"><i class="i32">search</i></button><br>
			</form>
			<h6 class="lblRechercheAvancee"><a href="#">Recherche avancée</a></h6>
		</section>
		<section class="moduleDerniersArticles">
			<section class="wrapContent">

			</section>
		</section>
	</main>

	<script src="res/app.js"></script>
</body>
</html>