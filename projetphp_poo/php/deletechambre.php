<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une chambre</title>

	<title>Supprimer une chambre</title>
	<style>
		body {
			display: flex;
			flex-direction: row;
			height: 100vh;
			margin: 0;
			padding: 0;
		}

		form {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			width: 50%;
			height: 100%;
			background-color: #D2B9B9;
		}

		input[type="text"], input[type="password"] {
			margin: 5px 0;
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 1px 1px 2px #ccc;
			width: 50%;
			font-size: 16px;
			font-family: Arial, sans-serif;
		}

		input[type="submit"] {
			margin-top: 10px;
			padding: 10px;
			border-radius: 5px;
			border: none;
			background-color: #9B1414;
			color: #fff;
			font-size: 16px;
			font-family: Arial, sans-serif;
			cursor: pointer;
		}

		#message {
			display: none;
			height: 100%;
			width: 50%;
			background-color: #9B1414;
			color: #000000;
			font-size: 24px;
			font-family: Arial, sans-serif;
			text-align: center;
			padding-top: 100px;
		}
	</style>
</head>
<body>
	<form id="login-form">
		<h1>Supprimer  une chambre </h1><br><br>
		<label for="username">Numéro chambre</label>
		<input type="text" id="username" name="username">

		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">

		

		<input type="submit" value="Se connecter">
	</form>

	<div id="message"></div>

	<script>
		const form = document.getElementById('login-form');
		const message = document.getElementById('message');

		form.addEventListener('submit', function(e) {
			e.preventDefault(); // empêche l'envoi du formulaire

			// Récupère les valeurs du formulaire
			const username = form.username.value;
			const password = form.password.value;

			// Vérifie les informations de connexion
			if (username === 'user' && password === 'password') {
				message.textContent = 'Vous êtes connecté(e) !';
				message.style.display = 'block';
			} else {
				message.textContent = 'Chambre Supprimée avec Succés.';
				message.style.display = 'block';
			}
		});
	</script>
</body>
</html>
