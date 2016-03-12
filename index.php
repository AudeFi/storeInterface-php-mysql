<?php
	require 'includes/config.php';
	require 'includes/form.php';

	$query = $pdo->query('SELECT * FROM avis ORDER BY id DESC');
	$avis = $query->fetchAll();

	$query = $pdo->query('SELECT AVG(note) AS moyenne FROM avis');
	$average = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
		<title>Store Interface | PHP-MySQL</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/magnific-popup.css">
		<link rel="stylesheet" href="src/css/style.css">
	</head>
	<body>

		<div class="header">

		</div>

		<div class="container">
			<div class="column column1">
				<div class="icon">
					<img src="src/medias/netflix-icon.png" width="150px">
				</div>
				<div class="details">
					<div class="title">
						Gratuit
					</div>
					Catégorie: Divertissement <br>
					Mise à jour : 7 mars 2016 <br>
					Version : 8.0.1 <br>
					Taille : 37.8 Mo <br>
					Éditeur : Netflix, Inc. <br>
					© 2011 Netflix, Inc. <br>
					<div class="title">
						Compatibilité :
					</div>
					Nécessite iOS 8.0 ou une version ultérieure. Compatible avec l’iPhone, l’iPad et l’iPod touch.
					<div class="title">
						Note
					</div>
					<div class="moyenne">
					Moyenne des utilisateurs
						<?php
							for($i=0; $i<round($average->moyenne); $i++){
								echo"<span>★</span>";
							}
						?>
					</div>
				</div>
			</div>
			<div class="column column2">
				<div class="description">
					<div class="title">
						Description
					</div>
					<div class="resume">
						Découvrez des milliers d'heures de programmes, dont des séries TV, des documentaires et des films originaux primés. 
Netflix propose du contenu pour tout le monde. Il y a même un espace sécurisé spécialement conçu pour les enfants, avec des programmes qui plairont à toute la famille.
					</div>
				</div>
				<div class="news">
					<div class="title">
						Nouveautés
					</div>
					<div class="resume">
						• Lecture automatique (épisode suivant ou suggestions) disponible sur iPhone <br>
						• Interface optimisée sur iPad Pro <br>
						• 3D Touch pris en charge
					</div>
				</div>
				<div class="pics">
					<a href="src/medias/screen0.jpeg" class="popup-link"><img src="src/medias/screen0.jpeg" width="85px"></a>
					<a href="src/medias/screen1.jpeg" class="popup-link"><img src="src/medias/screen1.jpeg" width="85px"></a>
					<a href="src/medias/screen2.jpeg" class="popup-link"><img src="src/medias/screen2.jpeg" width="85px"></a>
					<a href="src/medias/screen3.jpeg" class="popup-link"><img src="src/medias/screen3.jpeg" width="85px"></a>
					<a href="src/medias/screen4.jpeg" class="popup-link"><img src="src/medias/screen4.jpeg" width="85px"></a>
					<a href="src/medias/screen5.jpeg" class="popup-link"><img src="src/medias/screen5.jpeg" width="85px"></a>
				</div>
				<div class="avis-users">
					<div class="title">
						Avis des utilisateurs
					</div>
					<div class="avis">
						<?php foreach($avis as $_avi): ?>
							<div class="user">
								<div class="title"><?= $_avi->title ?></div>
								<div class="note">
									<?php
										for($i=0; $i<$_avi->note; $i++){
											echo"<span>★</span>";
										}
									?>
								</div>
								<div class="name">Par <?= $_avi->name ?> le <?= $_avi->date ?></div>
								<div class="comment"><?= $_avi->comment ?></div>
							</div>
						<?php endforeach; ?>
					</div>	
				</div>
				<div class="let-a-comment">
					<div class="title">
						Laissez votre avis
					</div>
				
					<form action="#" method="POST">
						<div class="column-form">
							<div class="text <?= array_key_exists('name', $errors) ? 'error' : '' ?>" >
								<input type="text" name="name" placeholder="Nom" value="<?= $name ?>">
							</div>
							
							<div class="text <?= array_key_exists('title', $errors) ? 'error' : '' ?>" >
								<input type="text" name="title" placeholder="Titre" value="<?= $title ?>">
							</div>
					
							<div class="stars-vote <?= array_key_exists('note', $errors) ? 'error' : '' ?>" >
								<input class="input-star" id="note5" name="note" type="radio" value="5"></a>
								<label for="note5">☆</label>
								<input class="input-star" id="note4" name="note" type="radio" value="4"></a>
								<label for="note4">☆</label>
								<input class="input-star" id="note3" name="note" type="radio" value="3"></a>
								<label for="note3">☆</label>
								<input class="input-star" id="note2" name="note" type="radio" value="2"></a>
								<label for="note2">☆</label>
								<input class="input-star" id="note1" name="note" type="radio" value="1"></a>
								<label for="note1">☆</label>
							</div>

						</div>

						<div class="column-form">
							<div class="textarea <?= array_key_exists('comment', $errors) ? 'error' : '' ?>" >
								<textarea name="comment" placeholder="Commentaire" value="<?= $comment ?>"></textarea>
							</div>
						</div>
						
						<div class="submit"><input type="submit"></div>	
					</form>

					<?php if(!empty($errors)): ?>
						<div class="errors">
							<?php foreach($errors as $_error): ?>
								<span><?= $_error ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if(!empty($success)): ?>
						<div class="success">
							<?php foreach($success as $_succes): ?>
								<span><?= $_succes ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>


		</div>

		
		<script src="src/js/libs/jquery-2.2.0.min.js"></script>
		<script src="src/js/libs/jquery.magnific-popup.js"></script>
		<script src="src/js/app/script.js"></script>
	</body>
</html>