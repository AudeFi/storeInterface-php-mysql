<?php

	

	$errors  = array();
	$success = array();
	$name    = '';
	$note     = '';
	$title   = '';
	$comment  = '';
	$date = date("Y-m-d");
	$photo  = '';

	// Data send
	if(!empty($_POST))
	{

		//Set variables
		$name     = trim($_POST['name']);
		$note     = trim($_POST['note']);
		$title    = trim($_POST['title']);
		$comment  = trim($_POST['comment']);


		$insults = array("con", "connard", "salope", "merde", "shit", "fuck", "punaise", "damn", "putain", "connasse", "conne", "encule");
		

		//Name errors
		if(empty($name))
			$errors['name'] = 'Entrez un nom. ';

		$name_check = explode(' ', $comment);
		foreach($name_check as $word){
			if (in_array($word, $insults))
				$errors['comment'] = "Surveillez votre language. ";
		}


		//Note errors
		if(empty($note))
			$errors['note'] = 'Entrez une note. ';

		//Title errors
		if(empty($title))
			$errors['title'] = 'Entrez un titre. ';

		$title_check = explode(' ', $comment);
		foreach($title_check as $word){
			if (in_array($word, $insults))
				$errors['comment'] = "Surveillez votre language. ";
		}


		//comment errors
		if(empty($comment))
			$errors['comment'] = 'Entrez un commentaire. ';

		$comment_check = explode(' ', $comment);
		foreach($comment_check as $word){
			if (in_array($word, $insults))
				$errors['comment'] = "Surveillez votre language. ";
		}

	
		

		//Success
		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO avis (name,title,comment,note,date) VALUES (:name,:title,:comment,:note,:date)');
			$prepare->bindValue('name',$name);
			$prepare->bindValue('note',$note);
			$prepare->bindValue('title',$title);
			$prepare->bindValue('comment',$comment);
			$prepare->bindValue('date',$date);

			$execute = $prepare->execute();

			if(!$execute)
			{
				$errors[] = "Une erreur s'est produite lors de la sauvegarde";
			}
			else
			{
				$success[] = 'Votre avis a été enregistré';

				$name    = '';
				$note     = '';
				$title  = '';
				$comment  = '';
			}		
		}

	}

