<html>
<?php session_start(); ?>
<head>
    <title>Index Page</title>
    
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    匯入資料：<input type="file" name="file" accept=".txt" />
    <input type="submit" name="submit" value="上傳檔案" />
    </form>
    
    資料匯出: <input type="button" value="匯出" onclick="javascript:location.href='output.php'" />
    <p nowrap style="text-align:right;">
    <form action="order.php" method="POST" style="text-align:right;">
        排序
        <select name="order" id="order">
            <option value="0" selected>出版社</option>
            <option value="1">書名</option>
            <option value="2">作者</option>
            <option value="3">定價</option>
            <option value="4">發行日</option>
        </select>
        方向
        <select name="sc" id="sc">
            <option value="0" selected>ASC</option>
            <option value="1">DESC</option>
        </select>
        <input type="submit" value="排序" />
    </form>
    </p>
    <table width="100%" border="1">
        <tr>
            <th width="20%">ISBN</th>
            <th width="15%">出版社</th>
            <th width="20%">書名</th>
            <th width="15%">作者</th>
            <th width="10%">定價</th>
            <th width="10%">發行日</th>
            <th width="10%">編輯/刪除</th>
        </tr>
        <?php 
        if(isset($_SESSION["data"])){
            for($i = 0; $i < count($_SESSION["data"]); $i++){            
        ?>
            <tr>
                <?php 
                for($j = 0; $j < count($_SESSION["data"][$i]); $j++){
                ?>
                <td><?php echo $_SESSION["data"][$i][$j] ?></td>

                <?php } ?>
                <td>
                <input type ="button" onclick="javascript:location.href='Edit.php?id=<?php echo $i ?>'" value="EDIT"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type ="button" onclick="javascript:location.href='Delete.php?id=<?php echo $i ?>'" value="DEL"></input>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
    </table>

    <p style="text-align:center;">
    <input type ="button" onclick="javascript:location.href='Add.php'" value="Add"></input>
    </p>
</body>



</html>