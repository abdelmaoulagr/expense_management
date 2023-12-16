<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect to my db </title>
</head>
<body>
    <div>
        <?php

            if(DB::connection()->getPdo()){
                echo "Successfully Connected to DB and DB tables  names is \n";
                $tables = DB::select('SHOW TABLES');
                foreach ($tables as $table) {
                    foreach ($table as $key => $value)
                        echo "$value \t";
                }
            }
        ?>
    </div>
</body>
</html>
