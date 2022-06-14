<?php

namespace App\Services\Writers;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class WriterTest extends TestCase
{
    /**
     * @var MockObject|Writer
     */
    private $object;

    public function testWriteArrayDb()
    {
        $this->object = $this->createMock(WriterDB::class);
        $this->object->method('writeArray')->willReturn([]);
        $this->assertIsArray($this->object->writeArray([2, 1], 2, [1, 2], 'Horizontal'));
    }

    public function testWriteArrayFile()
    {
        $this->object = $this->createMock(WriterFile::class);
        $this->object->method('writeArray')->willReturn('test string');
        $this->assertIsString($this->object->writeArray([2, 1], 2, [1, 2], 'Horizontal'));
    }

    public function testWriteArrayDisplay()
    {
        $this->object = new WriterDisplay();
        $this->assertIsArray($this->object->writeArray([2, 1], 2, [1, 2], 'Horizontal'));
    }
}
