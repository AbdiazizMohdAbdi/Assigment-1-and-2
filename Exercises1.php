<?php 
 
// 1. Greatest and Smallest 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>1. Greatest and Smallest</h2>"; 
 
$a = 15; 
$b = 8; 
$c = 22; 
 
$greatest = $a; 
$smallest = $a; 
 
if ($b > $greatest) $greatest = $b; 
if ($c > $greatest) $greatest = $c; 
 
if ($b < $smallest) $smallest = $b; 
if ($c < $smallest) $smallest = $c; 
 
echo "Greatest: $greatest<br>"; 
echo "Smallest: $smallest"; 
 
echo "<hr>"; 
 
 
// 2. Divisibility by 3 and 5 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>2. Divisibility by 3 and 5</h2>"; 
 
$num = 15; 
 
if ($num % 3 == 0 && $num % 5 == 0) { 
    echo "$num is divisible by both 3 and 5."; 
} elseif ($num % 3 == 0) { 
    echo "$num is divisible by 3."; 
} elseif ($num % 5 == 0) { 
    echo "$num is divisible by 5."; 
} else { 
    echo "$num is divisible by neither 3 nor 5."; 
} 
 
echo "<hr>"; 
 
 
// 3. Odd and Even Numbers 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>3. Odd and Even Numbers</h2>"; 
 
echo "Odd numbers from 2 to 20:<br>"; 
 
for ($i = 2; $i <= 20; $i++) { 
    if ($i % 2 != 0) { 
        echo "$i "; 
    } 
} 
 
echo "<br><br>"; 
 
echo "Even numbers from 35 to 7:<br>"; 
 
for ($i = 35; $i >= 7; $i--) { 
    if ($i % 2 == 0) { 
        echo "$i "; 
    } 
} 
 
echo "<hr>"; 
 
 
// 4. Numbers Divisible by Both 2 and 5 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>4. Numbers Divisible by Both 2 and 5</h2>"; 
 
for ($i = 50; $i >= 2; $i--) { 
    if ($i % 2 == 0 && $i % 5 == 0) { 
        echo "$i "; 
    } 
} 
 
echo "<hr>"; 
 
 
// 5. Reverse a Number 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>5. Reverse a Number</h2>"; 
 
$num = 12345; 
$reverse = 0; 
$temp = $num; 
 
while ($temp > 0) { 
    $digit = $temp % 10; 
    $reverse = ($reverse * 10) + $digit; 
    $temp = intdiv($temp, 10); 
} 
 
echo "Original: $num<br>"; 
echo "Reverse: $reverse"; 
 
echo "<hr>"; 
 
 
// 6. LCM of Two Numbers 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>6. LCM of Two Numbers</h2>"; 
 
$a = 8; 
$b = 12; 
 
$max = ($a > $b) ? $a : $b; 
$lcm = $max; 
 
while ($lcm % $a != 0 || $lcm % $b != 0) { 
    $lcm++; 
} 
 
echo "LCM of $a and $b = $lcm"; 
 
echo "<hr>"; 
 
 
// 7. HCF of Two Numbers 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>7. HCF of Two Numbers</h2>"; 
 
$a = 18; 
$b = 24; 
 
$x = abs($a); 
$y = abs($b); 
 
while ($y != 0) { 
    $remainder = $x % $y; 
    $x = $y; 
    $y = $remainder; 
} 
 
echo "HCF of $a and $b = $x"; 
 
echo "<hr>"; 
 
 
// 8. Multiplication Table 12 x 12 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>8. Multiplication Table 12 x 12</h2>"; 
 
echo "<table border='1' cellpadding='6' cellspacing='0'>"; 
 
for ($i = 1; $i <= 12; $i++) { 
    echo "<tr>"; 
 
    for ($j = 1; $j <= 12; $j++) { 
        echo "<td>" . ($i * $j) . "</td>"; 
    } 
 
    echo "</tr>"; 
} 
 
echo "</table>"; 
 
echo "<hr>"; 
 
 
// 9. Prime or Non-Prime Number 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>9. Prime or Non-Prime Number</h2>"; 
 
$num = 29; 
$isPrime = true; 
 
if ($num < 2) { 
    $isPrime = false; 
} else { 
    for ($i = 2; $i * $i <= $num; $i++) { 
        if ($num % $i == 0) { 
            $isPrime = false; 
            break; 
        } 
    } 
} 
 
echo $isPrime 
    ? "$num is a prime number." 
    : "$num is a non-prime number."; 
 
echo "<hr>"; 
 
 
// 10. Prime Numbers from 10 to 50 
echo "<h2 style='background-color: yellow; color: black; padding: 10px;'>10. Prime Numbers from 10 to 50</h2>"; 
 
for ($num = 10; $num <= 50; $num++) { 
    $isPrime = true; 
 
    if ($num < 2) { 
        $isPrime = false; 
    } else { 
        for ($i = 2; $i * $i <= $num; $i++) { 
            if ($num % $i == 0) { 
                $isPrime = false; 
                break; 
            } 
        } 
    } 
 
    if ($isPrime) { 
        echo "$num "; 
    } 
} 
 
?> 
 
 
 
