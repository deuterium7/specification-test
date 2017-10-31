<?php

namespace AlexanderZabornyi\SpecificationTest;

class AndSpecification implements SpecificationInterface
{
    private $specifications;

    /**
     * AndSpecification constructor.
     *
     * @param SpecificationInterface[] ...$specifications
     */
    public function __construct(SpecificationInterface ...$specifications)
    {
        $this->specifications = $specifications;
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
        foreach ($this->specifications as $specification) {
            if (! $specification->isSatisfiedBy($item)) {
                return false;
            }
        }

        return true;
    }
}