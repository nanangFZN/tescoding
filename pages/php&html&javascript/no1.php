<?php
function isPrime($number){
    if($number <= 1){
        return false;
    }
    if($number <= 3){
        return true;
    }
    if($number % 2 == 0 || $number % 3 == 0){
        return false;
    }
    $i = 5;
    while($i * $i <= $number ){
        if($number %  $i == 0 || $number %  ($i + 2) == 0){
            return false;
        }
        $i +=  6;
    }
    return true;
}

$primes = array();
for($i = 2 ; $i <= 100 ; $i++){
    if(isPrime($i)){
        $primes[] = $i;
    }
}

// Menampilkan hasil dengan perulangan
foreach($primes as $prime){
    echo $prime . " ";
}
?>
