<?php
include('config.php');
//http://localhost/uvlightapi2/delete.php?id=1

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['id' => 'false']);
} else {
    
    $req = $pdo->prepare("UPDATE documentclient SET supdocumentclient = 1 WHERE iddocumentclient = :iddocumentclient");
    $req->bindValue(':iddocumentclient', $_GET['id'], PDO::PARAM_INT);
    $req->execute();

    header('Access-Control-Allow-Origin: *');

    http_response_code(200);
    echo json_encode(['id' => 'true']);
}
