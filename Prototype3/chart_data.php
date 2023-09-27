<?php
$sql = "SELECT v.Nom AS City, COUNT(p.Id) AS NumberOfPeople
FROM ville v
LEFT JOIN personne p ON v.Id = p.Ville_Id
GROUP BY v.Nom";
$result = mysqli_query($connection, $sql);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

?>