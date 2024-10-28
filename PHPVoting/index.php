<?php
require_once './Modules/calculate.php';
require_once './Modules/readData.php';
require_once './Modules/saveData.php';
require_once './models/modelVoting.php';
require_once './models/modelBlackList.php';
require_once './Modules/AccessToVoting.php';
$readData = new ReadDAta();
$saveData = new SaveData();
$accessV = new AccesVoting();
$resultCalculate = new CalculateVoting();
$message = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Voting</title>
</head>

<body>
    <?php
    $dateUserNow = new DateTime("now");
    $nextAccsseVoting = new DateTime('now');
    $nextAccsseVoting->add(new DateInterval('P1D'));//P1D  (1 day),  //PT1M (1 minute)
    $userNow = "{$_SERVER['REMOTE_ADDR']};{$dateUserNow->format("d-m-y H:i")}";

/********************************Save or read Data**************************************************/    

    if ((bool)$readData->Readfile('./data/votingData') === false) {
        $actualData = new Voting();
        $voting = &$actualData->GetAllVotings();
    } else {
        $actualData = $readData->Readfile('./data/votingData');
        $voting = &$actualData->GetAllVotings();
    }
    $resultCalculate->Calculate($voting);

    if ((bool)$readData->Readfile('./data/blackList') === false) {
        $actualList = new BlackList();
        $blackList = &$actualList->GetAllList();
        $blackList[$_SERVER['REMOTE_ADDR']] = $nextAccsseVoting->format("d-m-y H:i");
        $saveData->SaveFile('./data/blackList', $actualList);
    } else {
        $actualList = $readData->Readfile('./data/blackList');
        $blackList = &$actualList->GetAllList();
    }

/**************************************************************************************************** */
        if (isset($_REQUEST['language'])) {

            $languageVoting = $_REQUEST['language'];

            if ((bool)empty($languageVoting) === false) {

                if ($accessV->IsAccess($blackList, $userNow)) {
                    $blackList[$_SERVER['REMOTE_ADDR']] = $nextAccsseVoting->format("d-m-y H:i");
                    $saveData->SaveFile('./data/blackList', $actualList);
                    $voting['allVotings'] += 1;
                    $voting[$languageVoting] += 1;
                    $saveData->SaveFile('./data/votingData', $actualData);
                    $resultCalculate->Calculate($voting);
                    $message = "<span class=\"message\" style=\"color:green\">You voted for {$languageVoting}</span>";
                 
                }else{

                    $message = "<span class=\"message\" style=\"color:green\">You have already voted (1 vote per 24 hours)</span>";
                }
            }
           
        }else{
            $message = "<span class=\"message\" style=\"color:green\">voted {$voting['allVotings']}</span>";
        }
    ?>


    <main>
        <form id="formVoting">
            <?php
            echo "$message";
            ?>
            <span class="header-text"> Vote up </span> <span class="header-text">Graphic vote</span> <span class="header-text">Procent vote</span>
            <div class="text"><input type="radio" name="language" value="C++" /> С++ </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetPlusPlus()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetPlusPlus()} %" ?>
            </span>

            <div class="text"><input type="radio" name="language" value="C#" /> С# </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetSharp()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetSharp()} %" ?>
            </span>

            <div class="text"><input type="radio" name="language" value="Java" />Java </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetJava()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetJava()} %" ?>
            </span>

            <div class="text"><input type="radio" name="language" value="PHP" />PHP </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetPHP()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetPHP()} %" ?>
            </span>

            <div class="text"><input type="radio" name="language" value="Python" />Python </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetPython()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetPython()} %" ?>
            </span>

            <div class="text"><input type="radio" name="language" value="JavaScript" />JavaScript </div>
            <div class="grafic">
                <span class="grafic-voting" style="width:<?php echo "{$resultCalculate->GetJS()}%" ?>;"></span>
            </div>
            <span class="header-text">
                <?php echo "{$resultCalculate->GetJS()} %" ?>
            </span>

            <button type="submit" class="text">Confirm</button>
        </form>
    </main>
</body>

</html>