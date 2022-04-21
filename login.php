<?php
include('config.php');
//https://localhost/uvlightapi2/login.php?nomclient=x&mdp=x

$nomclient = $_GET['nomclient'];
$mdp = $_GET['mdp'];

$req = $pdo->prepare("SELECT COUNT(*) AS count FROM client WHERE nomclient = :nomclient AND mdp = :mdp");
$req->bindValue(':nomclient', $_GET['nomclient'], PDO::PARAM_STR);
$req->bindValue(':mdp', $_GET['mdp'], PDO::PARAM_STR);
$req->execute();
while ($row = $req->fetch(PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $count = $row['count'];
}

header('Access-Control-Allow-Origin: *');

if($count == 1){
    http_response_code(200);
    echo json_encode(['login' => 'true']);
}else{
    http_response_code(400);
    echo json_encode(['login' => 'false']);
}

?>