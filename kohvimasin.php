<?php
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kohvi_img/favicon.ico">
    <link rel="stylesheet" href="css/kohvimasin.css">
    <title>Kohvimasin</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function hideWarningMessage() {
            var warningDiv = document.getElementById('warning_message');
            if (warningDiv) {
            setTimeout(function() {
                warningDiv.style.display = 'none';
            }, 2000);
            }
        }
        window.onload = hideWarningMessage;
    </script>
</head>
<body>
   <div class="div_main">
        <table>
            <tr>
                <th colspan="4"><h1>Kohvimasin</h1></th>    
            </tr>
            <tr>
                <td colspan="4" class="space-row"><div class="warning" id="warning_message"><?php echo isset($_GET['warning']) ? $_GET['warning'] : ''; ?></div></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><h2>Joogivalik</h2></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="button-allign-r">
                <form method="post" action="functions.php"><button type="submit" name="kohv">Kohv</button></form>
                </td>
                <td><div class="out" id="kohv" name="kohv"><?php echo $kohv_amount ?></div></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="button-allign-r">
                <form method="post" action="functions.php"><button type="submit" name="tee">Tee</button></form>
                </td>
                <td><div class="out" id="tee" name="tee"><?php echo $tee_amount ?></div></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="button-allign-r">
                <form method="post" action="functions.php"><button type="submit" name="kakao">Kakao</button></form>
                </td>
                <td><div class="out" id="kakao" name="kakao"><?php echo $kakao_amount ?></div></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="space-row"></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="button-allign-l">
                    <form action="admin.php">
                        <button type="submit">Admin</button>
                    </form>
                </td>
            </tr>
        </table>
   </div>
</body>
</html>