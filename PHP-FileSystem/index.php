<?php
$File = array();







if (isset($_REQUEST['serch'])) {

    if ($_REQUEST['mask'] != '' && $_REQUEST['srcFile'] !== '' && $_REQUEST['subStr'] === '') {
        switch ($_REQUEST['mask'][0]) {
            case '*':
                $nameF = substr($_REQUEST['mask'], 1);
                $anySumbolSomeCount = "/^.*($nameF)$/";
                $files = scandir($_REQUEST['srcFile']);

                if ($files) {
                    foreach ($files as $key => $value) {
                        if (preg_match($anySumbolSomeCount, $value)) {

                            array_push($File, $value);
                        }
                    }
                }
                break;
            case '?':
                $tempcount = strrpos($_REQUEST['mask'], '?');
                $count = $tempcount += 1;
                $nameF = substr($_REQUEST['mask'], $count);
                $AnySimbol = "/^.{{$count}}($nameF)$/";
                if(@scandir($_REQUEST['srcFile'])===false){

                    header('location:index.php');
                }
                $files = scandir($_REQUEST['srcFile']);

                if ($files) {
                    foreach ($files as $key => $value) {
                        if (preg_match($AnySimbol, $value)) {

                            array_push($File, $value);
                        }
                    }
                }
                break;
            default:
            if(@scandir($_REQUEST['srcFile'])===false){

                header('location:index.php');
            }
           
                $files = scandir($_REQUEST['srcFile']);
                $nameF = $_REQUEST['mask'];
                $fullName = "/^($nameF).*/";
                if ($files) {
                    foreach ($files as $key => $value) {
                        if (preg_match($fullName, $value)) {
                            array_push($File, $value);
                        };
                    };
                };
                break;
        }
    }
    if ($_REQUEST['mask'] != '' && $_REQUEST['srcFile'] !== '' && $_REQUEST['subStr'] !== '') {

       

        if(@scandir($_REQUEST['srcFile'])===false){

            header('location:index.php');
        }
        $files = scandir($_REQUEST['srcFile']);
        $nameF = $_REQUEST['mask'];
        $filter = "/^.*(.txt)$/";

        $nameF = $_REQUEST['mask'];
        $fullName = "/^($nameF).*/";


        $strfile = '';

        if ($files) {
            foreach ($files as $key => $value) {
                if (preg_match($fullName, $value)) {
                    if (preg_match($filter, $value)) {
                        $fileHendle = fopen("{$_REQUEST['srcFile']}/" . "{$value}", 'r');
                        if(filesize("{$_REQUEST['srcFile']}/" . "{$value}")>0){
                            $strfile = fread($fileHendle, filesize("{$_REQUEST['srcFile']}/" . "{$value}"));
                            fclose($fileHendle);
                            array_push($File,"File name:  ".$value);
                        }
                       
                    }
                };
            };
            for ($step = 0; $step < strlen($strfile); $step++) {
                $pos = mb_strpos($strfile,$_REQUEST['subStr'], $step);
                if ($pos === false) {

                    $step++;
                } else {
                    array_push($File,"Position  In file = ".$pos."."." For ( {$_REQUEST['subStr']} ) ");
                    $step = $pos;
                }
            }
        };
    };
};


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>File Syste</title>
</head>

<body>
    <main>
        <Form method="POST" class='search-form'>
            <span>Search file</span>
            <input type="text" name='mask' placeholder="Enter mask for search file">
            <input type="text" name='subStr' placeholder="Enter text for search in file">
            <input type="text" name='srcFile' placeholder="Enter SRC where you want to find the file.">
            <button type="submit" name='serch'>Start</button>
        </Form>
        <div class='result'>
            <?php
            foreach ($File as $key => $value)

                echo "<span class='message-result'>{$value}</span></br>"

            ?>

        </div>
    </main>
</body>

</html>