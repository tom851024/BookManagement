<?php 
session_start();
$num = $_POST["id"];
if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/', $_POST["Isbn"])){
    if(preg_match('/^[0-9]+$/', $_POST["price"])){
        if(preg_match("/^[0-9]{4}-(0([1-9]{1})|(1[0-2]))-(([0-2]([0-9]{1}))|(3[0|1]))$/", $_POST["date"])){
            $_SESSION["data"][$num][0] = $_POST["Isbn"];
            $_SESSION["data"][$num][1] = $_POST["comp"];
            $_SESSION["data"][$num][2] = $_POST["book"];
            $_SESSION["data"][$num][3] = $_POST["aut"];
            $_SESSION["data"][$num][4] = $_POST["price"];
            $_SESSION["data"][$num][5] = $_POST["date"];
            header('Location: index.php');
        }else{
            header('Location: Edit.php?date=1&id=' . $num);
        }
    }else{
        header('Location: Edit.php?price=1&id=' . $num);
    }
}else{
    header('Location: Edit.php?isbn=1&id=' . $num);
}
?>