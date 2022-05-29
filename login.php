<?php
include('config.php');
//http://localhost/uvlightapi2/login.php?nomclient=x&mdp=x

$req = $pdo->prepare("SELECT * FROM client WHERE nomclient = :nomclient AND mdp = :mdp");
$req->bindValue(':nomclient', $_GET['nomclient'], PDO::PARAM_STR);
$req->bindValue(':mdp', $_GET['mdp'], PDO::PARAM_STR);
$req->execute();

header('Access-Control-Allow-Origin: *');

if($req->rowCount() == 1){
    http_response_code(200);
    echo json_encode(['login' => 'true']);
}else{
    http_response_code(400);
    echo json_encode(['login' => 'false']);
}

?>