<?php
include 'C-function.php';

class CollatzHistogram extends Collatz {
    
    const HISTOGRAM_INTERVAL = 10;
    const MAX_ALLOWED_NUMBER = 1000000; 

    
    public function __construct($startNumber) {
        parent::__construct($startNumber);
    }

    
    public function calculateHistogram($start, $end) {
        if ($start > self::MAX_ALLOWED_NUMBER || $end > self::MAX_ALLOWED_NUMBER) {
            throw new Exception("Numbers exceed the maximum allowed value: " . self::MAX_ALLOWED_NUMBER);
        }

        $results = $this->calculateRange($start, $end);
        $histogram = [];

        foreach ($results as $result) {
            $iterations = $result[2];
            $bin = floor($iterations / self::HISTOGRAM_INTERVAL) * self::HISTOGRAM_INTERVAL;
            if (!isset($histogram[$bin])) {
                $histogram[$bin] = 0;
            }
            $histogram[$bin]++;
        }

        ksort($histogram); 
        return $histogram;
    }
}
?>