<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (empty($_POST['tinggi_badan'])||(empty($_POST['berat_badan']))) {
            $Error = "Tinggi badan dan berat badan tidak boleh kosong";
        }
        if (empty($Error)){
            $tb = $_POST['tinggi_badan'] / 100;
            $bb = $_POST['berat_badan'];
            $hitung = $bb / ($tb*$tb);
            if ($hitung <= 18.4){
            echo "
                Tinggi Badan:  $tb m
                <br> Berat Badan:  $bb kg
                <br> BMI: Underweight
            ";
            }

            elseif ($hitung<=24.9 and $hitung>=18.5) {
                echo "
                    Tinggi Badan: $tb m
                    <br> Berat Badan: $bb kg
                    <br> BMI: Normal
                ";
            }

            elseif ($hitung<=39.9 and $hitung>=25.0) {
                echo "
                    Tinggi Badan: $tb m
                    <br> Berat Badan: $bb kg
                    <br> BMI: Overweight
                ";
            }

            elseif ($hitung>=40) {
                echo "
                    Tinggi Badan: $tb m
                    <br> Berat Badan: $bb kg
                    <br> BMI: Obese
                ";
            }
        }
        else{
            echo $Error;
        }
    }                        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Kalkulator BMI</h4>
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="175">
                            <label for="tinggi_badan">Tinggi Badan (CM)</label>
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="53">
                            <label for="berat_badan">Berat Badan (KG)</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Hitung BMI</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>