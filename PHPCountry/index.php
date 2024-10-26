<?php
require_once './modules/saveCountry.php';
require_once './modules/readFile.php';
$countrySave = new CountrySave();
$countrySelect = ReadCity::Readfile("./data/country.txt");
$countryDictionary=ReadCity::Readfile("./data/dictionary.txt");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>City</title>
</head>

<body>

    <?php
    
    if (isset($_REQUEST['country'])) {
        $country = $_REQUEST['country'];


        if((bool)empty($country)===false){

            $isCountry = array_search("{$country}",$countryDictionary);
            if((bool)$isCountry!==false){
            $countrySave->save($country);
            $countrySelect = ReadCity::Readfile("./data/country.txt");
    
           }else{
    
            $countrySave->SetMessage("<span class=\"save-message\" style=\"color:red\">There is no such country</span>");
            
           }


        }else{

            $countrySave->SetMessage("<span class=\"save-message\" style=\"color:red\">Enter country please</span>");
        }
        
    
    }
    ?>
    <main>

        <form id='formCountry' method="post">
            <?php echo "{$countrySave->GetMessage()}";
            
           

            ?>
            <label class="text-setting">
                <h2>Enter country</h2>
            </label>
            <span class="validate-message"></span>
            <input placeholder="Enter country" name="country" type="text" require />
            <button type="submit">Confirm</button>
            <select>
                <?php

                foreach ($countrySelect as $value) {

                    echo "<option>{$value}</option>";
                }

                ?>

            </select>
        </form>
    </main>

</body>

</html>