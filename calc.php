<?php
$calculation='';
$animationClass='';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $value=$_POST['value'];
    $calculation=$_POST['calculation'];
    if($value==='DEL'){
        $calculation=substr($calculation,0,-1);
    }elseif($value==='='){
        $calculation=str_replace('%','/100',$calculation);
        $calculation=str_replace(['+','-','*','/'],['+ ','- ','* ','/ '],$calculation);
        $calculation=eval("return $calculation;");
        $animationClass='result';
    }elseif($value==='C'){
        $calculation='';
    }else{
        $calculation.=$value;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Kalkulator</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="calculator p-2 border">
                <form method="post">
                    <input type="text" class="display form-control mb-2 <?=$animationClass?>" name="calculation" value="<?=$calculation?>" readonly>
                    <div class="buttons">
                    <?php
                    $buttons=['7','8','9','+','4','5','6','-','1','2','3','*','0','.','%','/','DEL','C','='];
                    foreach($buttons as $button){
                        $class='button btn';
                        if($button==='DEL'||$button==='C'){
                            $class.=' clear';
                        }
                        echo '<button class="'.$class.'" type="submit" name="value" value="'.$button.'">'.$button.'</button>';
                    }
                    ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>