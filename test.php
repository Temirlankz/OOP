<!DOCTYPE html>
<html>
<head>
    <title>3x+1 Calculation</title>
</head>
<body>
    <h1>3x+1 Calculation</h1>
    <form action="function.php" method="get">
        <label for="start">Start:</label>
        <input type="number" id="start" name="start" min="10" max="1000000" required>
        <br>
        <label for="end">End:</label>
        <input type="number" id="end" name="end" min="10" max="1000000" required>
        <br>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
