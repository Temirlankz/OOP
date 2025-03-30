<!DOCTYPE html>
<html>
<head>
    <title>3x+1 Histogram</title>
</head>
<body>
    <h1>3x+1 Histogram Generator</h1>
    <form action="main.php" method="get">
        <label for="start">Start:</label>
        <input type="number" id="start" name="start" min="1" max="1000000" required>
        <br>
        <label for="end">End:</label>
        <input type="number" id="end" name="end" min="1" max="1000000" required>
        <br>
        <button type="submit">Generate Histogram</button>
    </form>

    <?php
    include 'Histogram.php';

    if (isset($_GET['start']) && isset($_GET['end'])) {
        $start = (int)$_GET['start'];
        $end = (int)$_GET['end'];

        if ($start < $end) {
            try {
                $collatzHistogram = new CollatzHistogram($start); // Instantiate the child class
                $histogram = $collatzHistogram->calculateHistogram($start, $end); // Generate the histogram

                echo "<h2>Histogram of Iteration Values</h2>";
                foreach ($histogram as $bin => $count) {
                    echo "<p>Iterations in range {$bin} - " . ($bin + CollatzHistogram::HISTOGRAM_INTERVAL - 1) . ": {$count}</p>";
                }
            } catch (Exception $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<h3>Please ensure the start value is less than the end value.</h3>";
        }
    }
    ?>
</body>
</html>