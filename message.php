<?php
include('config.php');
//http://localhost/uvlightapi2/login.php?nomclient=x&mdp=x

if (!isset($_GET['message']) && !isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'false']);
} else {
    
    $req = $pdo->prepare("INSERT INTO message (iddocumentclient, libmessage, datemessage, typemessage) VALUES (:iddocumentclient, :libmessage, NOW(), 'Vous');");
    $req->bindValue(':libmessage', $_GET['message'], PDO::PARAM_STR);
    $req->bindValue(':iddocumentclient', $_GET['id'], PDO::PARAM_INT);
    $req->execute();

    header('Access-Control-Allow-Origin: *');

    http_response_code(200);
    echo json_encode(['message' => 'true']);
}
