<?php

namespace Latitude\QueryBuilder;

use Latitude\QueryBuilder\Expression as e;
use PHPUnit\Framework\TestCase;
class ValueListTest extends TestCase
{
    public function testList()
    {
        $values = ValueList::make([1, 2, 3]);
        $this->assertSame('(?, ?, ?)', $values->sql());
        $this->assertSame([1, 2, 3], $values->params());
        $this->assertCount(3, $values);
    }
    public function testPlaceholders()
    {
        $values = ValueList::make([true, false, null, e::make('NOW()')]);
        $this->assertSame('(TRUE, FALSE, NULL, NOW())', $values->sql());
        $this->assertSame([], $values->params());
    }
}