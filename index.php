<?php
require './Pagination.php';

if (!isset($_GET["get"]))
    $_GET["get"] = 1;


$data = array(
    array("Alice", "Dupont", 25),
    array("Bob", "Martin", 35),
    array("Charlie", "Smith", 42),
    array("David", "Lee", 29),
    array("Emma", "Jones", 47),
    array("Francis", "Lee", 22),
    array("Gina", "Chen", 31),
    array("Harry", "Nguyen", 38),
    array("Isabelle", "Royer", 27),
    array("Jack", "Wong", 45),
);

$pagination=new Pagination();
$pagination->ligne=2; // gérer le nombre de ligne que dois afficher
$btn=$pagination->Pagination_Btn($data,$_GET["get"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>
<style>
    table{
        border: 1px black;
        width: 500px;
        text-align: center;
        margin: 0 auto;

    }
    #page{
        color: blue;
        background-color:cornflowerblue ;
        border: 1px solid;
    }
    #btn{
        color: blue;
        background: none;
        border: 1px solid;
        font-size: medium;
        border-radius: 3px;
   
    }
    #h1{
        color:red;
    }
</style>
<body>
    <center>
        <h1 id="h1">Pagination</h1>
        <?php
            $pagination->Pagination_Nb($btn,$_GET["get"]);
        ?>
    </center>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
        </tr>
        <?php
            $pagination->GetTablePage($data,$_GET["get"]);
        ?>
    </table>
</body>
</html>