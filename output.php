<?php
session_start();
$boo = true; 
if(isset($_SESSION["data"])){
    $file = fopen("Output.txt", "w+");
    $filename = "Output.txt";
    $str = "";
    for($i = 0; $i < count($_SESSION["data"]); $i++){
        if($i == (count($_SESSION["data"]) -1)){ //資料最後一行 不加入換行符號
            $str = $str . $_SESSION["data"][$i][0] . "," . $_SESSION["data"][$i][1] . "," . $_SESSION["data"][$i][2] . "," .  $_SESSION["data"][$i][3] . "," . $_SESSION["data"][$i][4] . "," . $_SESSION["data"][$i][5];
        }else{
            $str = $str . $_SESSION["data"][$i][0] . "," . $_SESSION["data"][$i][1] . "," . $_SESSION["data"][$i][2] . "," .  $_SESSION["data"][$i][3] . "," . $_SESSION["data"][$i][4] . "," . $_SESSION["data"][$i][5] . "\n";
        }
        
    }
    fwrite($file, $str);
    fclose($file);
    header("Content-Type: application/force-download"); //下載輸出檔案
    header("Content-Disposition: attachment; filename=".$filename); 
    readfile($filename);
    if(file_exists($filename)){ //刪除匯出暫存檔
        unlink($filename);
    }
    exit; //不加此exit會造成下載文件中有html標籤
    //header("location: index.php");
}else{
    $boo = false;
}

?>
<html>
<body>
    <?php if(!$boo){ ?>
        無檔案可匯出!
        <input type ="button" onclick="javascript:location.href='index.php'" value="Home"></input>
    <?php }else{ ?>

    <?php } ?>
</body>
<html>