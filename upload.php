<?php 
session_start();
// echo $_FILES["file"]["name"] . "<br />";
// echo $_FILES["file"]["tmp_name"] . "<br />";
// echo $_FILES["file"]["type"] . "<br />";
if(empty($_FILES["file"]["name"])){
    echo "<script>alert('匯入資料為空');
    location.href = 'index.php';
    </script>";
    exit;
}

$txtarr = array();
$n1 = 0;
//$filename = $_FILES["file"]["name"];
//move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
$filename = "Text.txt";
move_uploaded_file($_FILES["file"]["tmp_name"], $filename);

$handle = fopen($filename, "r");
while(!feof($handle)){
    $txtarr[$n1] = array();
   // echo fgets($handle). "<br />";
    $str = fgets($handle);
    $str = str_replace("\n","",$str); //不要讀入換行符號
    $txtarr[$n1] = explode(",", $str);
    $n1++;
}

fclose($handle);
//加入判斷式 判斷匯入資料格式
for($i = 0; $i < count($txtarr); $i++){
    if(count($txtarr[$i]) != 6){ //判斷資料有缺少欄位
        echo "<script>alert('匯入資料格式錯誤');
                      location.href = 'index.php';
        </script>";
        exit;
    }
    for($j = 0; $j < count($txtarr[$i]); $j++){ //判斷資料有空白
        if(empty($txtarr[$i][$j])){
            echo "<script>alert('匯入資料有欄位空白');
                      location.href = 'index.php';
            </script>";
            exit;
        }
    }
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/', $txtarr[$i][0])){ //判斷ISBN格式
        echo "<script>alert('匯入ISBN格式錯誤');
        location.href = 'index.php';
        </script>";
        exit;
    }

    if(!preg_match('/^[0-9]+$/', $txtarr[$i][4])){ //判斷定價格式
        echo "<script>alert('匯入定價格式錯誤');
        location.href = 'index.php';
        </script>";
        exit;
    }

    if(!preg_match("/^[0-9]{4}-(0([1-9]{1})|(1[0-2]))-(([0-2]([0-9]{1}))|(3[0|1]))$/", $txtarr[$i][5])){ //判斷發行日格式
        echo "<script>alert('匯入發行日格式錯誤');
        location.href = 'index.php';
        </script>";
        exit;
    }
}
$_SESSION["data"] = $txtarr;
header("location: index.php");
?>