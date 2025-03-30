

<!DOCTYPE html>
<html>
<head>
    <title>3x+1 OOP Example</title>
</head>
<body>
    <h1>3x+1 OOP Implementation</h1>
    <form action="main.php" method="get">
        <label for="start">Start:</label>
        <input type="number" id="start" name="start" min="10" max="1000000" required>
        <br>
        <label for="end">End:</label>
        <input type="number" id="end" name="end" min="10" max="1000000" required>
        <br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    // Include the class
    include 'C-function.php';

    if (isset($_GET['start']) && isset($_GET['end'])) {
        $start = (int)$_GET['start'];
        $end = (int)$_GET['end'];

        if ($start >= 10 && $end <= 1000000 && $start < $end) {

            $collatz = new Collatz($start);


            $stats = $collatz->getStatistics($start, $end);

            echo "<h2>Results:</h2>";
            echo "<p>Number with max iterations: {$stats['max_iterations'][0]} ({$stats['max_iterations'][2]} iterations)</p>";
            echo "<p>Number with min iterations: {$stats['min_iterations'][0]} ({$stats['min_iterations'][2]} iterations)</p>";
            echo "<p>Number with max value: {$stats['max_value'][0]} ({$stats['max_value'][1]} max value)</p>";
        } else {
            echo "<h3>Please provide a valid range (10 to 1,000,000).</h3>";
        }
    }
    ?>
</body>
</html>