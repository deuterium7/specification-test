<?php

namespace AlexanderZabornyi\SpecificationTest;

class OrSpecification implements SpecificationInterface
{
    private $specifications;

    /**
     * OrSpecification constructor.
     *
     * @param SpecificationInterface[] ...$specification
     */
    public function __construct(SpecificationInterface ...$specification)
    {
        $this->specifications = $specification;
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
            if ($specification->isSatisfiedBy($item)) {
                return true;
            }
        }

        return false;
    }
}