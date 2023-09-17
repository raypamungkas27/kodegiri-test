
<?php
$data = ['11', '12', 'cii', '001', '2', '1998', '7', '89', 'iia', 'fii'];

$result = [];


foreach ($data as $str) {

    if (ctype_alpha($str)) {
        $substrings = [];
        $length = strlen($str);

        for ($i = 0; $i < $length; $i++) {
            for ($j = $i + 1; $j <= $length; $j++) {
                $sub = substr($str, $i, $j - $i);

                $substrings[] = $sub;
            }
        }
        $result[$str] = $substrings;
    }
}


$combined = [];
foreach ($result as $substrings) {
    $combined = array_merge($combined, $substrings);
}

$combined = array_values(array_unique($combined));
sort($combined);


foreach ($result as $str => $substrings) {
    echo "$str = " . json_encode($substrings) . "\n";
}

echo "S = " . json_encode($combined) . "\n";
