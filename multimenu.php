<?php
$servername = "localhost";
$username = "root";
$password = "";


try
{
    $conn = new PDO("mysql:host=$servername;dbname=horacek", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    echo "Connected successfully";
}
catch (PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT 1 FROM categories";
$stm = $conn -> prepare($sql);
$stm->execute();
$1 = $stm -> fetch();
$sql2 = "SELECT 2 FROM categories";
$stm2 = $conn -> prepare($sql2);
$stm2->execute();
$2 = $stm2 -> fetch();
$sql3 = "SELECT 3 FROM categories";
$stm3 = $conn -> prepare($sql3);
$stm3->execute();
$3 = $stm3 -> fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .dropdown-submenu
        {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu
        {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Multi-Level Dropdown menu</h2>
    <div class="dropdown">
        <button class="btn btn-default" type="button" data-toggle="dropdown">menu
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php
            foreach ($1 as $1)
                echo '<li><a tabindex="-1" href="#">'.$1.'</a></li>';
            ?>
            <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">2<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($2 as $2)
                        echo '<li><a tabindex="-1" href="#">'.$2.'</a></li>';
                    ?>
                    <li class="dropdown-submenu">
                        <a class="test" href="#">3<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($3 as $3)
                                echo '<li><a tabindex="-1" href="#">'.$3.'</a></li>';
                            ?>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
</body>
</html>
