<?php

$resultat = array(
	'result'  => false,
	'message' => '<div id="alert-danger" class="alert alert-danger">Person not Found</div>'
);
if (isset($_POST['lastname']) && isset($_POST['firstname'])) {
	if (!empty($_POST['lastname']) && !empty($_POST['firstname'])) {
		$contenu = json_decode(file_get_contents("base.json"));

		$trouve=false;
		foreach ($contenu as $objet) {
			if (
				($objet->lastname==$_POST['lastname'])
				&& ($objet->firstname==$_POST['firstname'])
			) {
                $firstname = $obj->firstname;
                $lastname = $obj->lastname;
                $age = $obj->age;
                $phone = $obj->phone;
                $event = $obj->event;
                $location = $obj->location;
                $state = $obj->state;
				$trouve=true;
				break;
			}
		}

		if ($trouve==true) {
			$resultat = array(
				'result'  => true,
				'message' => '<div id="alert-success" class="alert alert-success">Person Found !!!</div>'
			);
		}
	}
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);
