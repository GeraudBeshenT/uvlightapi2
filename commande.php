<?php
include('config.php');
//https://localhost/uvlightapi2/commande.php?idclient=1

$idclient = $_GET['idclient'];
$data = [];
$req = $pdo->prepare("SELECT iddocumentclient, datedocclient, commentaireclient, statutclient, D.idetat, D.idclient FROM documentclient D INNER JOIN client CL ON D.idclient = CL.idclient WHERE D.idclient = :idclient");
$req->bindValue(':idclient', $idclient, PDO::PARAM_STR);
$req->execute();
while ($row = $req->fetch(PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $data[] = [
        'iddocumentclient' => $row['iddocumentclient'],
        'datedoclient' => $row['datedocclient'],
        'statutclient' => $row['statutclient'],
        'idetat' => $row['libetat'],
        'idclient' => $row['nomclient']];
}

header('Access-Control-Allow-Origin: *');

{
    http_response_code(200);
    echo json_encode($data);
}

?>