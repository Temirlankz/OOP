<!-- <?php
class Collatz {
    private $startNumber;

    public function __construct($startNumber) {
        $this->startNumber = $startNumber;
    }

    // Method to calculate Collatz sequence for one number
    public function calculateSequence($number) {
        $sequence = [];
        while ($number != 1) {
            $sequence[] = $number;
            if ($number % 2 == 0) {
                $number = $number / 2;
            } else {
                $number = 3 * $number + 1;
            }
        }
        $sequence[] = 1; 
        return $sequence;
    }


    public function calculateRange($start, $end) {
        $results = [];
        for ($num = $start; $num <= $end; $num++) {
            $sequence = $this->calculateSequence($num);
            $maxValue = max($sequence);
            $iterations = count($sequence) - 1; 
            $results[] = [$num, $maxValue, $iterations];
        }
        return $results;
    }

    // Method to get statistics 
    public function getStatistics($start, $end) {
        $results = $this->calculateRange($start, $end);

        $maxIterations = $results[0];
        $minIterations = $results[0];
        $maxValue = $results[0];

        foreach ($results as $result) {
            if ($result[2] > $maxIterations[2]) {
                $maxIterations = $result;
            }
            if ($result[2] < $minIterations[2]) {
                $minIterations = $result;
            }
            if ($result[1] > $maxValue[1]) {
                $maxValue = $result;
            }
        }

        return [
            'max_iterations' => $maxIterations,
            'min_iterations' => $minIterations,
            'max_value' => $maxValue
        ];
    }
}
?> -->