<?php


// File #1
//Location of file: freedom/Freedom.php
class Questionone {
    
    /**
     * This function returns the nth largest number from an array.
     * 
     * @param Array     $collection     an array of all elements.
     * @param Integer   $nth            position of the largest number from array            
     * 
     * @return Array 
     */


    public function getNthLargestNumber($collection, $nth){
        
        // Write a function that would return the Nth largest element from start or 
        // the end (default from the end) in an array, and then provide a set of test cases against that function.
        // Note: That is the Nth largest element in the sorted order, not the Nth distinct element.
        // [3,2,1,5,6,4], n = 2, from = end, return 5.
        // Rohit: I dont get the mean of position from start or end. It does not make any difference 
        // even we check from start or end for the nth largest number, the value will keep same.

        $response = [];
        $response['status'] = FALSE;

        if (count($collection) == 0) {
            $response['message'] = "The collection does not have any value.";
            return $response;
        }

        if (count($collection) < $nth) {
            $response['message'] = "The collection does not have values as shared nth position.";
            return $response;
        }


        /* Sorted collection in ascending order */
        sort($collection);

        /* Remove duplicate values from array */
        $uniqueCollection = array_unique($collection);

        if (count($uniqueCollection) < $nth) {
            $response['message'] = "The collection does not have unique values as shared nth position.";
            return $response;
        }

        $uniqueCollection = array_values($uniqueCollection);
        $response['result'] = $uniqueCollection[count($uniqueCollection) - $nth];
        $response['status'] = TRUE;
        return $response;
    }
}


/* uncomment below code to check the response */ 
// $collection = [3,2,1,5,5,6,6,4];
// // $collection = [2,2,2];
// $questionOne = new Questionone();
// $res = $questionOne->getNthLargestNumber($collection, 2);
// echo '<pre>'; print_r($res); die;
?>

<?php
// file #2
// Location: freedom/phpunit.xml
<?xml version="1.0" encoding="UTF-8" ?>
<phpunit colors="true" verbose="true" bootstrap="vendor/autoload.php">
    <testsuites>        
        <testsuite name="largestnumber">
            <directory suffix="Test.php">tests/largestnumber</directory>
        </testsuite>
    </testsuites>    
</phpunit>


// File #3
// Location: freedom/tests/largestnumber/LargestNumberTest.php

use PHPUnit\Framework\TestCase;

class LargestNumberTest extends TestCase
{
    public function testLargestNumber() {
        require 'Questionone.php';

        $QuestionOne = new Questionone;
        
        $emptyCollection = [];
        $emptyCollectionPosition = 1;
        $result = $QuestionOne->getNthLargestNumber($emptyCollection, $emptyCollectionPosition);
        $this->assertFalse($result['status']);

        $smallCollection = [1,5,6];
        $smallCollectionPosition = 4;
        $result = $QuestionOne->getNthLargestNumber($smallCollection, $smallCollectionPosition);
        $this->assertFalse($result['status']);

        $duplicateValuesCollection = [1,5,5,6,6];
        $duplicateValuesCollectionPosition = 4;
        $result = $QuestionOne->getNthLargestNumber($duplicateValuesCollection, $duplicateValuesCollectionPosition);
        $this->assertFalse($result['status']);

        $collection = [3,2,1,5,6,4];
        $collectionPosition = 2;
        $result = $QuestionOne->getNthLargestNumber($collection, $collectionPosition);
        $this->assertTrue($result['status']);
        $this->assertEquals($result['result'], 5);

    } 

}

?>