<?php 
$fizzbuzzArray = array();
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 === 0 && $i % 4 === 0) {
        $fizzbuzzArray[] = "FizzBuzz";
    } elseif ($i % 3 === 0) {
        $fizzbuzzArray[] = "Fizz";
    } elseif ($i % 4 === 0) {
        $fizzbuzzArray[] = "Buzz";
    } else {
        $fizzbuzzArray[] = $i;
    }
}

// Mencetak hasil dengan perulangan
foreach ($fizzbuzzArray as $value) {
    echo $value . " ";
}
?>
