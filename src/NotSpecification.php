<?php

namespace AlexanderZabornyi\SpecificationTest;

class NotSpecification implements SpecificationInterface
{
    private $specification;

    /**
     * NotSpecification constructor.
     *
     * @param SpecificationInterface $specification
     */
    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    /**
     * Удолетворяет условию?
     *
     * @param Item $item
     *
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        return !$this->specification->isSatisfiedBy($item);
    }
}