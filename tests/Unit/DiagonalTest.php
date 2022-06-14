<?php

namespace App\Services\Arrays;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DiagonalTest extends TestCase
{
    /**
     * @var MockObject|Sorter
     */
    private $object;

    public function addDataProvider()
    {
        return [
            [2, [0 => 1, 1 => 2, 2 => 3, 3 => 4]],
            [2, [0 => 4, 1 => 3, 2 => 2, 3 => 1]],
            [2, [0 => 3, 1 => 2, 2 => 1, 3 => 4]],
            [2, [0 => 3, 1 => 1, 2 => 2, 3 => 4]],
            [2, [0 => 2, 1 => 1, 2 => 3, 3 => 4]],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testSortArray($size, $inputArray)
    {
        $this->object = new Diagonal();
        $this->object->sortArray($size, $inputArray);
        $this->assertTrue(true);
    }

    public function testGetOutputArray()
    {
        $this->object = $this->createMock(Diagonal::class);
        $this->object->method('sortArray')->willReturn([]);
        $this->assertIsArray($this->object->getOutputArray());
    }
}
