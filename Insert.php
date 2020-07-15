<?php 
    session_start();
    if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/', $_POST["Isbn"])){
        if(preg_match('/^[0-9]+$/', $_POST["price"])){
            if(preg_match("/^[0-9]{4}-(0([1-9]{1})|(1[0-2]))-(([0-2]([0-9]{1}))|(3[0|1]))$/", $_POST["date"])){
                if(isset($_SESSION["data"])){
                    array_push($_SESSION["data"], array($_POST["Isbn"], $_POST["comp"], $_POST["book"], $_POST["aut"], $_POST["price"], $_POST["date"]));
                    header('Location: index.php');
                }else{
                    $txtarr = array();
                    array_push($txtarr, array($_POST["Isbn"], $_POST["comp"], $_POST["book"], $_POST["aut"], $_POST["price"], $_POST["date"]));
                    $_SESSION["data"] = $txtarr;
                    header('Location: index.php');
                }
            }else{
                header('Location: Add.php?date=1');
            }
        }else{
            header('Location: Add.php?price=1');
        }
    }else{
        header('Location: Add.php?isbn=1');
    }
?>