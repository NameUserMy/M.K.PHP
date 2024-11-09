<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
try{
    $user = "root";
    $pass = "";
    $db = new PDO('mysql:host=localhost;dbname=shop', $user, $pass);

    $tables = $db->query('SHOW TABLES');
    while($row = $tables->fetch())
    {
        $nametable[] = $row[0];
    }
    $n = count($nametable);

    for ($i = 0; $i < $n; $i++)
    {
        echo "<table border='1' width='100%'>";
        echo "<caption style = 'font-size:20pt;font-weight:bold'>".$nametable[$i]."</caption>";
        echo "<thead><tr>";
        $q = "SHOW COLUMNS FROM ". $nametable[$i];
        $sth = $db->query($q);
        while($row = $sth->fetch())
        {
            $namecolumn[] = $row[0];
            echo "<th>".$row[0]."</th>";
        }

        echo "</tr></thead>";
        $query = "SELECT * FROM " . $nametable[$i];
        $stmt = $db->query($query);
        $number_fields = $stmt->columnCount();

        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            for ($j = 0; $j < $number_fields; $j++)
            {
                if($row[$namecolumn[$j]])
                    echo ("<td>".$row[$namecolumn[$j]]."</td>");
                else
                    echo ("<td>&nbsp;</td>");
            }
            echo "</tr>";
        }
        unset ($namecolumn);
        echo "</table><br />";
    }
}
catch(PDOException $e)
{
    //Вывести сообщение и прекратить выполнение текущего скрипта
	die("Error: ".$e->getMessage());
}
?>
</body>
</html>