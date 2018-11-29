<?php

$file = "";


if (!empty($_POST)) {
    $file = $_POST["file"];
    

    $csv = file_get_contents($file);

    
    $json = array_map("str_getcsv", explode("\n", $csv));
    
    $json = str_replace('[', '{', $json);
    $json = str_replace(']', '}', $json);
    
    $keys = $json[0];
    $results = array();
    for ($i = 1; $i < count($json); $i++) {
        $result = array_combine($keys, $json[$i]);
        array_push($results, $result);
    }
    $results = json_encode($results);
    
};



?>

<!doctype html>
<html lang="en">
  <head>
    <title>CSV-2-JSON</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .form-label {
            font-weight: bold;
        }
        .wrapper {
            border: solid slategray 1px;
            padding: 25px;
            border-radius: 5px;
            background: slategray;
            color: lightgray;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .btn-primary {
            background: slategray;
            border-color: lightgray;
            vertical-align: center;
        }
        .btn-primary:hover, .btn-primary:active {
            background: lightgray;
            border-color: lightgray;
        }
        #results {
            text-align: center;
           
        }

    </style>
  </head>
  <body>
    <div class="container">
        <div class="wrapper">
            <h1>CSV-2-JSON Object Converter</h1>
            <b><p>Thank you for using this tool!</p></b>
            <i>
                <p>To use this, first add the .CSV file you would like to convert.</p>
                <p>Copy the file name for the file you would like to convert into the text input.</p>
                <p>Hit the "Get JSON Object"</p>
            </i>
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-4">
                        <input type="text" name="file" class="form-control" placeholder="my_file.csv">
                    </div>    
                    <button type="submit" class="btn btn-primary" name="submit">Get JSON Object</button>
                </div>
            </form>
        </div>
    </div>
     
    <div class="container" id="results">
        <?php print_r($results); ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>