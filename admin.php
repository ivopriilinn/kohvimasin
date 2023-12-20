<?php
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kohvi_img/favicon.ico">
    <link rel="stylesheet" href="css/kohvimasin_admin.css">
    <title>Admin</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th colspan="3"><h2>Kontrollpaneel</h2></th>
            </tr>
            <tr>
                <td>Joogid</td>
                <td>Kogus masinas</td>
                <td>Lisa kogus</td>
            </tr>
            <tr>
                <td>Kohv</td>
                <td><div class="out"><?php echo $kohv_amount ?></div></td>
                <td><form method="post" action="functions.php"><button type="submit" name="lisa_kohv">Lisa 40</button></form></td>
            </tr>
            <tr>
                <td>Tee</td>
                <td><div class="out"><?php echo $tee_amount ?></div></td>
                <td><form method="post" action="functions.php"><button type="submit" name="lisa_tee">Lisa 50</button></form></td>
            </tr>
            <tr>
                <td>Kakao</td>
                <td><div class="out"><?php echo $kakao_amount ?></div></td>
                <td><form method="post" action="functions.php"><button type="submit" name="lisa_kakao">Lisa 20</button></form></td>
            </tr>
            <tr>
                <td colspan="3"><form action="kohvimasin.php"><button type="submit" class="kohvimasin">Kohvimasin</button></form></td>
            </tr>
        </table>
    </div>
</body>
</html>