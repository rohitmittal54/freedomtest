<?php

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
