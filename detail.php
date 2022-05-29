<?php
include('config.php');
//http://localhost/uvlightapi2/login.php?nomclient=x&mdp=x

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['commandes' => 'false']);
} else {
    $data = [];

    $req = $pdo->prepare("SELECT * FROM documentclient D INNER JOIN etat E ON E.idetat=D.idetat WHERE D.iddocumentclient = :iddocumentclient");
    $req->bindValue(':iddocumentclient', $_GET['id'], PDO::PARAM_STR);
    $req->execute();
    while ($row = $req->fetch(PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $data[] = $row;
    }

    header('Access-Control-Allow-Origin: *');

    http_response_code(200);
    echo json_encode($data);
}
