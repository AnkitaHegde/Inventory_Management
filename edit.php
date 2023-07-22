<?php

include('config.php');


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($db, $_POST['product_name']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $quant = mysqli_real_escape_string($db, $_POST['quantity']);

    mysqli_query($db, "UPDATE product SET product_name='$name', price='$price' ,quantity='$quant' WHERE product_id='$id'");

    header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id=" . $_GET['id']);

    $row = mysqli_fetch_array($result);

    if ($row) {

        $id = $row['product_id'];
        $name = $row['product_name'];
        $price = $row['price'];
        $quant = $row['quantity'];
    } else {
        echo "No results!";
    }
}
?>
<style>
    <?php include 'css/edit_table.css'; ?>
</style>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Edit Item</title>

</head>

<body>



    <form action="" method="post" action="edit.php" class="tab">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <table border="3" class="center">
            <tr class="edit_title">
                <th colspan="2" height="30"><b>
                        <font color='Black' size='6.5'>Edit Items </font>
                    </b></th>
            </tr>
            <tr>
                <td width="179" height="50">
                    <font color='#663300' size='5'>Item Name<em>*</em></font>
                </td>
                <td class="input_type"><label>
                        <input type="text" name="product_name" value="<?php echo $name; ?>" />
                    </label></td>
            </tr>

            <tr>
                <td width="179" height="50">
                    <font color='#663300' size='5'>Price<em>*</em></font>
                </td>
                <td class="input_type"><label>
                        <input type="text" name="price" value="<?php echo $price ?>" />
                    </label></td>
            </tr>

            <tr>
                <td width="179" height="50">
                    <font color='#663300' size='5'>Quantity<em>*</em></font>
                </td>
                <td class="input_type"><label>
                        <input type="text" name="quantity" value="<?php echo $quant; ?>" />
                    </label></td>
            </tr>

            <tr>

                <td height="30" class="actions" color='#663300'><label>
                        <a class="link" href="https://mail.google.com">Email<em>*</em></a>

                    </label></td>

                <td height="30" class="button_actions"><label>


                        <input type="submit" name="submit" value="Edit">
                    </label></td>
            </tr>
        </table>
    </form>
</body>

</html>