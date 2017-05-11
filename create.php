<?php

$connection=new PDO("mysql:host=127.0.0.1;
dbname=rbsass22;
charset=utf8","root","epikzf45");

function generatePassword($length = 8) {
	 $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	 $count = strlen($chars);

	 for ($i = 0, $result = ''; $i < $length; $i++) {
	     $index = rand(0, $count - 1);
	     $result .= substr($chars, $index, 1);
	 }

	 return $result;
}

$monfichier = fopen('compte.sh', 'a+');

for($id=2003;$id<4002;$id++){
		$user=$connection->query("select * from salarie where id='$id';");
		$donnee = $user->fetch();
		$pseudo = $donnee['nom'].'-'.$donnee['prenom'];
	 	$pseudo = str_replace(' ', '', $pseudo);
	 	while( strpos(file_get_contents("./compte.sh"),$pseudo) !== false) {
			$pseudo = $pseudo.(rand(10,100));
   	}
    $email = $pseudo.'@symfony.fr';
    $pass = generatePassword(10);
    //echo $passsha1."\n";
		fputs($monfichier, 'php bin/console fos:user:create ');
		fputs($monfichier,$pseudo." ");
		fputs($monfichier,$email." ");
		fputs($monfichier,$pass);
		fputs($monfichier,"\n");
			 //$sqlinsert = "INSERT INTO salarieCompte ( id, username,username_canonical,email,email_canonical,enabled, pass, password)
       //VALUES ('$id', '$email', '$pass', '$passsha1')";
       //$connection->query($sqlinsert);
}

$id = 4002;

$user=$connection->query("select * from salarie where id='$id';");
$donnee = $user->fetch();
$pseudo = $donnee['nom'].'-'.$donnee['prenom'];
$pseudo = str_replace(' ', '', $pseudo);
while( strpos(file_get_contents("./compte.sh"),$pseudo) !== false) {
	$pseudo = $pseudo.(rand(10,100));
}
$email = $pseudo.'@symfony.fr';
$pass = "testpassus";
//echo $passsha1."\n";
fputs($monfichier, 'php bin/console fos:user:create ');
fputs($monfichier,$pseudo." ");
fputs($monfichier,$email." ");
fputs($monfichier,$pass);
fputs($monfichier,"\n");
?>
