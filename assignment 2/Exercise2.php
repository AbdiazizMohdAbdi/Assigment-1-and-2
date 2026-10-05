<?php

/* ==================================================
   QUESTION 1
   ================================================== */

echo "<h2 style='background:#3498db;color:white;padding:10px;border-radius:6px;'>
Question 1
</h2>";

$array = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

$total = array_sum($array);
$even = 0;
$odd = 0;

foreach ($array as $number) {
    if ($number % 2 == 0)
        $even += $number;
    else
        $odd += $number;
}

$min = min($array);
$max = max($array);


/* Array Table */

echo "<table style='border-collapse:collapse;text-align:center;box-shadow:0 2px 6px #bbb;'>
<tr style='background:#3498db;color:white;'>
<th style='padding:8px;'>Array Elements</th>
</tr>";

foreach ($array as $number) {
    echo "<tr>
            <td style='border:1px solid #777;padding:8px;'>$number</td>
          </tr>";
}

echo "</table>";


/* Result Table */

echo "<table style='border-collapse:collapse;margin-top:15px;text-align:center;'>
<tr>
<th style='background:#3498db;color:white;padding:8px;'>Total</th>
<th style='background:#2ecc71;color:white;padding:8px;'>Even Total</th>
<th style='background:#f39c12;color:white;padding:8px;'>Odd Total</th>
<th style='background:#8e44ad;color:white;padding:8px;'>Minimum</th>
<th style='background:#e74c3c;color:white;padding:8px;'>Maximum</th>
</tr>

<tr>
<td style='background:#d6eaf8;padding:10px;'>$total</td>
<td style='background:#d5f5e3;padding:10px;'>$even</td>
<td style='background:#fdebd0;padding:10px;'>$odd</td>
<td style='background:#eadcf8;padding:10px;'>$min</td>
<td style='background:#fadbd8;padding:10px;'>$max</td>
</tr>
</table>";


/* ==================================================
   QUESTION 2
   ================================================== */

echo "<h2 style='background:#8e44ad;color:white;padding:10px;border-radius:6px;'>
Question 2
</h2>";

$colors = [
    "Light" => ["Light Red", "Light Green", "Light Blue"],
    "Normal" => ["Normal Red", "Normal Green", "Normal Blue"],
    "Dark" => ["Dark Red", "Dark Green", "Dark Blue"]
];

echo "<table style='border-collapse:collapse;text-align:center;box-shadow:0 2px 6px #bbb;'>
<tr style='background:#8e44ad;color:white;'>
<th style='padding:9px;'>Type</th>
<th style='padding:9px;'>Red</th>
<th style='padding:9px;'>Green</th>
<th style='padding:9px;'>Blue</th>
</tr>";

foreach ($colors as $name => $row) {

    echo "<tr>";

    echo "<th style='background:#eadcf8;padding:8px;border:1px solid #777;'>
            $name
          </th>";

    foreach ($row as $value) {
        echo "<td style='padding:8px;border:1px solid #777;'>
                $value
              </td>";
    }

    echo "</tr>";
}

echo "</table>";


/* ==================================================
   QUESTION 3
   ================================================== */

echo "<h2 style='background:#e67e22;color:white;padding:10px;border-radius:6px;'>
Question 3
</h2>";

$matrix = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];

$odd = 0;
$even = 0;
$all = 0;

$rowTotals = [0, 0, 0];
$colTotals = [0, 0, 0];

$numbers = [];

echo "<table style='border-collapse:collapse;text-align:center;box-shadow:0 2px 6px #bbb;'>";

foreach ($matrix as $i => $row) {

    echo "<tr>";

    foreach ($row as $j => $number) {

        echo "<td style='background:#fff3e0;border:1px solid #777;
        padding:12px;font-weight:bold;'>$number</td>";

        $numbers[] = $number;
        $all += $number;
        $rowTotals[$i] += $number;
        $colTotals[$j] += $number;

        if ($number % 2 == 0)
            $even += $number;
        else
            $odd += $number;
    }

    echo "</tr>";
}

echo "</table>";

$diagonal1 = $matrix[0][0] + $matrix[1][1] + $matrix[2][2];
$diagonal2 = $matrix[0][2] + $matrix[1][1] + $matrix[2][0];

$min = min($numbers);
$max = max($numbers);


/* Q3 Results */

echo "<table style='border-collapse:collapse;margin-top:15px;text-align:center;'>";

echo "<tr>
<th style='background:#e67e22;color:white;padding:8px;'>Odd Total</th>
<th style='background:#2ecc71;color:white;padding:8px;'>Even Total</th>
<th style='background:#3498db;color:white;padding:8px;'>Row Totals</th>
<th style='background:#9b59b6;color:white;padding:8px;'>Column Totals</th>
</tr>";

echo "<tr>
<td style='background:#fdebd0;padding:9px;'>$odd</td>
<td style='background:#d5f5e3;padding:9px;'>$even</td>
<td style='background:#d6eaf8;padding:9px;'>" . implode(", ", $rowTotals) . "</td>
<td style='background:#eadcf8;padding:9px;'>" . implode(", ", $colTotals) . "</td>
</tr>";

echo "</table>";

echo "<table style='border-collapse:collapse;margin-top:10px;text-align:center;'>";

echo "<tr>
<th style='background:#e67e22;color:white;padding:8px;'>Diagonal 1</th>
<th style='background:#3498db;color:white;padding:8px;'>Diagonal 2</th>
<th style='background:#16a085;color:white;padding:8px;'>All Total</th>
<th style='background:#8e44ad;color:white;padding:8px;'>Minimum</th>
<th style='background:#e74c3c;color:white;padding:8px;'>Maximum</th>
</tr>";

echo "<tr>
<td style='padding:9px;background:#fdebd0;'>$diagonal1</td>
<td style='padding:9px;background:#d6eaf8;'>$diagonal2</td>
<td style='padding:9px;background:#d1f2eb;'>$all</td>
<td style='padding:9px;background:#eadcf8;'>$min</td>
<td style='padding:9px;background:#fadbd8;'>$max</td>
</tr>";

echo "</table>";


/* ==================================================
   QUESTION 4
   ================================================== */

echo "<h2 style='background:#16a085;color:white;padding:10px;border-radius:6px;'>
Question 4
</h2>";

$customers = [

    "CA221" => [
        "Mohamed Ahmed Ali",
        "0648440403",
        "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Ahmed Abdi Jama",
        "0647223201",
        "Taleex, Hodan"
    ],

    "CA224" => [
        "Amina Nur Adan",
        "0646990276",
        "Macmacaanka, Dharkeynley"
    ]
];

echo "<table style='border-collapse:collapse;text-align:center;box-shadow:0 2px 6px #bbb;'>

<tr style='background:#16a085;color:white;'>
<th style='padding:9px;'>ID</th>
<th style='padding:9px;'>Name</th>
<th style='padding:9px;'>Phone</th>
<th style='padding:9px;'>Address</th>
</tr>";

foreach ($customers as $id => $customer) {

    echo "<tr>";

    echo "<td style='background:#d1f2eb;border:1px solid #777;padding:8px;'>
            <b>$id</b>
          </td>";

    echo "<td style='border:1px solid #777;padding:8px;'>
            $customer[0]
          </td>";

    echo "<td style='border:1px solid #777;padding:8px;'>
            $customer[1]
          </td>";

    echo "<td style='border:1px solid #777;padding:8px;'>
            $customer[2]
          </td>";

    echo "</tr>";
}

echo "</table>";


/* ==================================================
   QUESTION 5
   ================================================== */

echo "<h2 style='background:#c0392b;color:white;padding:10px;border-radius:6px;'>
Question 5
</h2>";

$students = [

    "Semester 1" => [
        ["subject1", 9, 26, 10, 40, 85, "Pass"],
        ["subject2", 9, 26, 10, 40, 85, "Pass"],
        ["subject3", 9, 26, 10, 40, 85, "Pass"]
    ],

    "Semester 2" => [
        ["subject1", 9, 26, 10, 0, 45, "Fail"],
        ["subject2", 9, 26, 10, 40, 85, "Pass"],
        ["subject3", 9, 26, 10, 40, 85, "Pass"]
    ]
];

echo "<table style='border-collapse:collapse;text-align:center;
box-shadow:0 2px 6px #bbb;font-size:14px;'>";

echo "<tr style='background:#5b2c6f;color:white;'>
<th style='padding:8px;'>Semester</th>
<th style='padding:8px;'>Course</th>
<th style='padding:8px;'>CW1</th>
<th style='padding:8px;'>MidTerm</th>
<th style='padding:8px;'>CW2</th>
<th style='padding:8px;'>Final</th>
<th style='padding:8px;'>Total</th>
<th style='padding:8px;'>Status</th>
</tr>";

foreach ($students as $semester => $subjects) {

    foreach ($subjects as $i => $s) {

        echo "<tr>";

        if ($i == 0) {
            echo "<td rowspan='3'
            style='background:#e8daef;border:1px solid #777;padding:8px;'>
            <b>$semester</b>
            </td>";
        }

        echo "<td style='border:1px solid #777;padding:8px;'>$s[0]</td>";
        echo "<td style='border:1px solid #777;padding:8px;'>$s[1]</td>";
        echo "<td style='border:1px solid #777;padding:8px;'>$s[2]</td>";
        echo "<td style='border:1px solid #777;padding:8px;'>$s[3]</td>";
        echo "<td style='border:1px solid #777;padding:8px;'>$s[4]</td>";

        echo "<td style='border:1px solid #777;padding:8px;'>
        <b>$s[5]</b>
        </td>";

        if ($s[6] == "Pass") {

            echo "<td style='background:#2ecc71;color:white;
            border:1px solid #777;padding:8px;font-weight:bold;'>
            Pass
            </td>";
        } else {

            echo "<td style='background:#e74c3c;color:white;
            border:1px solid #777;padding:8px;font-weight:bold;'>
            Fail
            </td>";
        }

        echo "</tr>";
    }
}

echo "</table>";
