<?php

namespace AlexanderZabornyi\SpecificationTest\Tests;

use AlexanderZabornyi\SpecificationTest\AndSpecification;
use AlexanderZabornyi\SpecificationTest\Item;
use AlexanderZabornyi\SpecificationTest\NotSpecification;
use AlexanderZabornyi\SpecificationTest\OrSpecification;
use AlexanderZabornyi\SpecificationTest\PriceSpecification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    public function testCanOr()
    {
        $specification1 = new PriceSpecification(23, 97);
        $specification2 = new PriceSpecification(102, 154);

        $orSpecification = new OrSpecification($specification1, $specification2);

        $this->assertTrue($orSpecification->isSatisfiedBy(new Item(64)));
        $this->assertFalse($orSpecification->isSatisfiedBy(new Item(100)));
    }

    public function testCanAnd()
    {
        $specification1 = new PriceSpecification(23, 109);
        $specification2 = new PriceSpecification(102, 154);

        $andSpecification = new AndSpecification($specification1, $specification2);

        $this->assertTrue($andSpecification->isSatisfiedBy(new Item(107)));
        $this->assertFalse($andSpecification->isSatisfiedBy(new Item(45)));
    }

    public function testCanNot()
    {
        $specification = new PriceSpecification(23, 109);
        $notSpecification = new NotSpecification($specification);

        $this->assertTrue($notSpecification->isSatisfiedBy(new Item(142)));
        $this->assertFalse($notSpecification->isSatisfiedBy(new Item(45)));
    }
}