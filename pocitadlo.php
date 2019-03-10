<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=horacek", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php
$sql = "SELECT pocet FROM pocitadlo";
$stm = $conn -> prepare($sql);
$stm->execute();
$pocet = $stm -> fetch();
foreach ($pocet as $pocet){
    $number = $pocet;
    $number ++;
}
echo "Pocet: ". $number;
$sql = "UPDATE pocitadlo SET pocet = :pocet";
$stm = $conn -> prepare($sql);
$stm -> execute (array(	"pocet" => $number));
?>
