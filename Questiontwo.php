<?php

class Questiontwo {
    
    /**
     * This function returns the largest or smallest number from elements of an array.
     * 
     * @param Array     $collection     an array of all elements.
     * @param type      $type           largest or smallest            
     * 
     * @return Array 
     */


    public function getLargestOrSmallestNumber($collection, $type = 'largest'){
        
        // Write a function that would: arrange an array of positive integers to form the largest number or 
        // the smallest number. (default largest)
        // Note: Return a string instead of an integer in case the result is too large.
        // For example, given [2, 20, 24, 6, 8], type = largest, the largest formed number is 8624220.
 
        $response = [];
        $response['status'] = FALSE;

        if (count($collection) == 0) {
            $response['message'] = "The collection does not have any value.";
            return $response;
        }

        /* Sorted collection in ascending order */
        if ($type == 'smallest') {
            usort($collection, array($this, 'getSmallestCollection'));
        } else {
            usort($collection, array($this, 'getLargestCollection'));
        }
        
        $response['result'] = '';
        foreach ($collection as $item ) {
            $response['result'] .= $item;
        }

        $response['status'] = TRUE;
        return $response;
    }

    public function getLargestCollection($firstVal, $secondVal) {
        // we need to concat both string and compare which is larger
        $firtString = $firstVal.$secondVal;
        $secondString = $secondVal.$firstVal;
        return strcmp($firtString, $secondString) < 0 ? 1: 0;
    }

    public function getSmallestCollection($firstVal, $secondVal) {
        // we need to concat both string and compare which is smaller
        $firtString = $firstVal.$secondVal;
        $secondString = $secondVal.$firstVal;
        return strcmp($firtString, $secondString) < 0 ? 0: 1;
    }
}

/* uncomment below code to check the response */ 
$collection = [2, 20, 24, 6, 8];
$questionTwo = new Questiontwo();
$res = $questionTwo->getLargestOrSmallestNumber($collection, 'largest');
echo '<pre>'; print_r($res); die;


?>