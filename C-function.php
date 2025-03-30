
<?php
class Collatz {
    private $startNumber;

    public function __construct($startNumber) {
        $this->startNumber = $startNumber;
    }

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
}
?>
