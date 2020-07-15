<?php 
session_start();
if(isset($_POST["order"]) && isset($_POST["sc"])){

    $order = $_POST["order"] + 1; //書籍資料欄位
    $sc = $_POST["sc"]; //升序 降序
    $tmpArr = array();
    foreach($_SESSION["data"] as $data){
        $tmpArr[] = $data[$order];
        //echo $data[$order];
    }
    if($sc == 0){
        array_multisort($tmpArr, SORT_ASC, $_SESSION["data"]);
    }else if($sc == 1){
        array_multisort($tmpArr, SORT_DESC, $_SESSION["data"]);
    }
    header('Location: index.php');
}else{
    header('Location: index.php');
}

?>