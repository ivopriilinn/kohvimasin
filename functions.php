<?php
require($_SERVER["DOCUMENT_ROOT"] . "/config.php");
global $yhendus;

function log_($logtext)
{
    file_put_contents("test.log", date("d.m.y h:i:s") . " " . $logtext . PHP_EOL, FILE_APPEND);
}

$sql_kohv_amount = "SELECT topse_alles FROM Kohvimasin WHERE jook = 'kohv'";
$kohv_amount = $yhendus->query($sql_kohv_amount)->fetch_assoc()['topse_alles'];

$sql_tee_amount = "SELECT topse_alles FROM Kohvimasin WHERE jook = 'tee'";
$tee_amount = $yhendus->query($sql_tee_amount)->fetch_assoc()['topse_alles'];

$sql_kakao_amount = "SELECT topse_alles FROM Kohvimasin WHERE jook = 'kakao'";
$kakao_amount = $yhendus->query($sql_kakao_amount)->fetch_assoc()['topse_alles'];

$warningMessage = "";

// Jook on otsa teade
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["kohv"]) && $kohv_amount <= 0) {
        $warningMessage = "Kohv on otsas!";
        redirectWithWarning($warningMessage);
    } elseif (isset($_POST["tee"]) && $tee_amount <= 0) {
        $warningMessage = "Tee on otsas!";
        redirectWithWarning($warningMessage);
    } elseif (isset($_POST["kakao"]) && $kakao_amount <= 0) {
        $warningMessage = "Kakao on otsas!";
        redirectWithWarning($warningMessage);
    } else {
        $warningMessage = "";
    }
}

// Function to redirect with warning
function redirectWithWarning($message){
    header("Location: kohvimasin.php?warning=" . urlencode($message));
    exit;
}


// Kohvi tellimine
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kohv"])) {
    if ($kohv_amount > 0) {
        $sql_one_kohv = "UPDATE Kohvimasin SET topse_alles = topse_alles - 1 WHERE jook = 'kohv'";
        if ($yhendus->query($sql_one_kohv) === true) {
            header("Location: kohvimasin.php?kohvi=tellitud");
            exit;
        }
    }
}

// Tee tellimine
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tee"])) {
    if ($tee_amount > 0) {
        $sql_one_tee = "UPDATE Kohvimasin SET topse_alles = topse_alles - 1 WHERE jook = 'tee'";
        if ($yhendus->query($sql_one_tee) === true) {
            header("Location: kohvimasin.php?tee=tellitud");
            exit;
        }
    }
}

// Kakao tellimine
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kakao"])) {
    if ($kakao_amount > 0) {
        $sql_one_kakao = "UPDATE Kohvimasin SET topse_alles = topse_alles - 1 WHERE jook = 'kakao'";
        if ($yhendus->query($sql_one_kakao) === true) {
            header("Location: kohvimasin.php?kakao=tellitud");
            exit;
        }
    }
}

// Kohvi lisamine
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lisa_kohv"])) {
        $sql_lisa_kohv = "UPDATE Kohvimasin SET topse_alles = topse_alles + topse_pakis WHERE jook = 'kohv'";
        if ($yhendus->query($sql_lisa_kohv) === true) {
            header("Location: admin.php?kohvi=lisatud");
            exit;
        }   
}

// Tee lisamine
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lisa_tee"])) {
    $sql_lisa_tee = "UPDATE Kohvimasin SET topse_alles = topse_alles + topse_pakis WHERE jook = 'tee'";
    if ($yhendus->query($sql_lisa_tee) === true) {
        header("Location: admin.php?tee=lisatud");
        exit;
    }   
}

// Kakao lisamine
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lisa_kakao"])) {
    $sql_lisa_kakao = "UPDATE Kohvimasin SET topse_alles = topse_alles + topse_pakis WHERE jook = 'kakao'";
    if ($yhendus->query($sql_lisa_kakao) === true) {
        header("Location: admin.php?kakao=lisatud");
        exit;
    }   
}


?>
