<?php
function collatz_sequence($n) {
    $sequence = [];
    while ($n != 1) {
        $sequence[] = $n;
        if ($n % 2 == 0) {
            $n = $n / 2;
        } else {
            $n = 3 * $n + 1;
        }
    }
    $sequence[] = 1; // Include the final 1 in the sequence
    return $sequence;
}

function collatz_max_iterations($n) {
    $sequence = collatz_sequence($n);
    $max_value = max($sequence);
    $iterations = count($sequence) - 1; // Number of steps to reach 1
    return [$max_value, $iterations];
}

function collatz_range($start, $end) {
    $results = [];
    for ($n = $start; $n <= $end; $n++) {
        list($max_value, $iterations) = collatz_max_iterations($n);
        $results[] = [$n, $max_value, $iterations];
    }
    return $results;
}

function find_max_min_iterations($results) {
    if (empty($results)) {
        return [null, null];
    }

    $max_iterations = $results[0];
    $min_iterations = $results[0];

    foreach ($results as $result) {
        if ($result[2] > $max_iterations[2]) {
            $max_iterations = $result;
        }
        if ($result[2] < $min_iterations[2]) {
            $min_iterations = $result;
        }
    }
    return [$max_iterations, $min_iterations];
}

function print_results($results) {
    if (empty($results)) {
        echo "<p>No results to display.</p>";
        return;
    }

    foreach ($results as $result) {
        echo "<p>Number: {$result[0]}, Max value: {$result[1]}, Iterations: {$result[2]}</p>";
    }

    list($max_iterations, $min_iterations) = find_max_min_iterations($results);
    $max_value = array_reduce($results, function($carry, $item) {
        return ($carry === null || $item[1] > $carry[1]) ? $item : $carry;
    }, null);

    if ($max_iterations && $min_iterations && $max_value) {
        echo "<p>Number with max iterations: {$max_iterations[0]} ({$max_iterations[2]} iterations)</p>";
        echo "<p>Number with min iterations: {$min_iterations[0]} ({$min_iterations[2]} iterations)</p>";
        echo "<p>Number with highest value: {$max_value[0]} ({$max_value[1]} max value)</p>";
    } else {
        echo "<p>No valid results found.</p>";
    }
}

if (isset($_GET['start']) && isset($_GET['end'])) {
    $start = (int)$_GET['start'];
    $end = (int)$_GET['end'];

    if ($start >= 10 && $start <= 1000000 && $end >= 10 && $end <= 1000000 && $start < $end) {
        $results = collatz_range($start, $end);
        print_results($results);
    } else {
        echo "<h3>Please ensure that the start and end values are between 10 and 1,000,000, and that the start value is less than the end value.</h3>";
    }
}
?>

