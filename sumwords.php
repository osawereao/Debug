<?php
function numberToWords($number) {

  $ones = [0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',  5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine'];
  $teens = [10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen'];
  $tens = [2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty', 6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'];





  $result = ucfirst(trim($dollarsWords . 'dollars ' . $centsWords));
  return $result;
}

// Example usage:
// $amount = '123456.78';
// $amount = '931725.00';
$amount = '0.00';
echo number_format($amount);
echo'<br>';
echo numberToWords($amount); // Outputs: "One hundred twenty-three thousand four hundred fifty-six dollars and seventy-eight cents"
?>
