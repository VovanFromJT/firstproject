<?php

namespace App\Services\Writers;

use App\Exceptions\CustomException;
use PHPUnit\Framework\TestCase;

class WriterFactoryTest extends TestCase
{
    private WriterFactory $invalidWriterFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->invalidWriterFactory = new WriterFactory('failAction');
    }

    public function addDataProvider() {
        return [
            [WriterFactoryCase::sort->name, new WriterDisplay()],
            [WriterFactoryCase::file->name, new WriterFile()],
            [WriterFactoryCase::db->name, new WriterDB()],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testValidCreateProduct($name, $expected)
    {
        $validWriterFactory = new WriterFactory($name);
        $result = $validWriterFactory->createProduct();

        $this->assertEquals($expected, $result);
    }

    public function testInvalidCreateProduct()
    {
        $this->expectException(CustomException::class);

        $this->invalidWriterFactory->createProduct();
    }
}
