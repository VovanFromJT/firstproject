<?php

namespace App\Helpers;

use PHPUnit\Framework\TestCase;
use TypeError;

class GenerateArrayTest extends TestCase
{

    public function addValidDataProvider()
    {
        return [
          [2],
          [5],
          [10],
          [15],
          [20],
        ];
    }

    public function addInvalidDataProvider()
    {
        return [
            ['fas'],
            [''],
            ['.'],
        ];
    }

    /**
     * @dataProvider addValidDataProvider
     */
    public function testValidGenerateArray($size)
    {
        $generator = new GenerateArray($size);

        $this->assertIsArray($generator->generateArray());
    }

    /**
     * @dataProvider addInvalidDataProvider
     */
    public function testInvalidGenerateArray($size)
    {
        $this->expectException(TypeError::class);
        $generator = new GenerateArray($size);
        $this->assertIsArray($generator->generateArray());
    }
}
