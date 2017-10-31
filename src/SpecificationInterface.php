<?php

namespace AlexanderZabornyi\SpecificationTest;

interface SpecificationInterface
{
    public function isSatisfiedBy(Item $item): bool;
}