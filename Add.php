<html>
    <head>
        <title>Add Page</title>
    </head>

    <body>
        <form action="Insert.php" method="POST" style="text-align:center;">
            <table border="1" align="center">
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="Isbn" maxLength="13" required="required" /></td>
                </tr>
                <tr>
                    <td>出版社</td>
                    <td><input type="text" name="comp" maxLength="20" required="required" /></td>
                </tr>
                <tr>
                    <td>書名</td>
                    <td><input type="text" name="book" maxLength="20" required="required" /></td>
                </tr>
                <tr>
                    <td>作者</td>
                    <td><input type="text" name="aut" maxLength="20" required="required" /></td>
                </tr>
                <tr>
                    <td>定價</td>
                    <td><input type="text" name="price" maxLength="20" required="required" /></td>
                </tr>
                <tr>
                    <td>發行日</td>
                    <td><input type="text" name="date" maxLength="10" required="required" /></td>
                </tr>
            </table>

            <input type="submit" value="Add" />
        </form>
        <p style="text-align:center;">
        <input type ="button" onclick="javascript:location.href='index.php'" value="Home"></input>
        </p>
    </body>

    <script>
        var getUrlString = location.href; //取得get參數
        var url = new URL(getUrlString);
        var isbn = url.searchParams.get('isbn');
        var price = url.searchParams.get('price');
        var date = url.searchParams.get('date');
        if(isbn == '1'){
            alert('ISBN格式輸入錯誤');
        }else if(price == '1'){
            alert('價格格式輸入錯誤');
        }else if(date == '1'){
            alert('發行日格式輸入錯誤');
        }
    </script>

</html>