<?php
include('config.php');
//https://localhost/uvlightapi2/commande.php?idclient=1

$idclient = $_GET['idclient'];
$data = [];
$req = $pdo->prepare("SELECT idcom, nomcom, prix, C.idclient, nomclient, commentaire FROM commande C INNER JOIN client CL ON C.idclient = CL.idclient WHERE C.idclient = :idclient");
$req->bindValue(':idclient', $idclient, PDO::PARAM_STR);
$req->execute();
while ($row = $req->fetch(PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $data[] = [
        'idcom' => $row['idcom'],
        'nomcom' => $row['nomcom'],
        'prix' => $row['prix'],
        'idclient' => $row['nomclient'],
        'commentaire' => $row['commentaire']];
}

header('Access-Control-Allow-Origin: *');

{
    http_response_code(200);
    echo json_encode($data);
}

?>