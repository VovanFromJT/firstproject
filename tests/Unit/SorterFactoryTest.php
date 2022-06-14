<?php

namespace App\Services\Arrays;

use App\Exceptions\CustomException;
use PHPUnit\Framework\TestCase;

class SorterFactoryTest extends TestCase
{
    private SorterFactory $invalidSorterFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->invalidSorterFactory = new SorterFactory('FailKindSort');
    }

    public function addDataProvider() {
        return [
            [SorterFactoryCase::Horizontal->name, new Horizontal()],
            [SorterFactoryCase::Vertical->name, new Vertical()],
            [SorterFactoryCase::Snake->name, new Snake()],
            [SorterFactoryCase::Diagonal->name, new Diagonal()],
            [SorterFactoryCase::Snail->name, new Snail()],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testValidCreateProduct($name, $expected)
    {
        $validSorterFactory = new SorterFactory($name);
        $result = $validSorterFactory->createProduct();

        $this->assertEquals($expected, $result);
    }

    public function testInvalidCreateProduct()
    {
        $this->expectException(CustomException::class);

        $this->invalidSorterFactory->createProduct();
    }
}
