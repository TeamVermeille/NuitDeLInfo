<?php
 
 if (isset($_POST['lastname']) && isset($_POST['firstname'])) {
	if (!empty($_POST['lastname']) && !empty($_POST['firstname'])) {
		$contenu = json_decode(file_get_contents("base.json"));
		$nouvel_utilisateur = new StdClass();
		$nouvel_utilisateur->lastname=$_POST['lastname'];
		$nouvel_utilisateur->firstname=$_POST['firstname'];
		$nouvel_utilisateur->age=$_POST['age'];
		$nouvel_utilisateur->phone=$_POST['phone'];
		$nouvel_utilisateur->event=$_POST['age'];
		$nouvel_utilisateur->location=$_POST['location'];
		$nouvel_utilisateur->state=$_POST['state'];

		$trouve=false;
		foreach ($contenu as $objet) {
			if (
				($objet->firstname==$_POST['firstname'])
				&& ($objet->lastname==$_POST['lastname'])
			) {
				$trouve=true;
				break;
			}
		}

		if ($trouve==false) {
			array_push($contenu, $nouvel_utilisateur);
			$ok = file_put_contents("base.json", json_encode($contenu));
			if ($ok!==false) {
				$resultat = array(
					'result'  => true,
					'message' => '<div id="alert-success" class="alert alert-success"> <b> Successfully Registered !</div>'
				);
			} else {
				$resultat = array(
					'result'  => false,
					'message' => '<div id="alert-success" class="alert alert-danger"> <b>Failed Registration</b</div>'
				);
			}
		} else{
			$resultat = array(
				'result'  => false,
				'message' => '<div id="alert-success" class="alert alert-warning"> <b> Person Already Registered</b</div>'
			);
		}
	}
}
 
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);
echo $lastname;
