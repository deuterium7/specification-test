<?php

namespace AlexanderZabornyi\SpecificationTest;

class PriceSpecification implements SpecificationInterface
{
    private $minPrice;
    private $maxPrice;

    /**
     * PriceSpecification constructor.
     *
     * @param float $minPrice
     * @param float $maxPrice
     */
    public function __construct(float $minPrice, float $maxPrice)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }

    /**
     * Удолетворяет стоимости?
     *
     * @param Item $item
     *
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        if ($this->maxPrice !== null && $item->getPrice() > $this->maxPrice) {
            return false;
        }

        if ($this->minPrice !== null && $item->getPrice() < $this->minPrice) {
            return false;
        }

        return true;
    }
}