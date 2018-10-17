<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services have conditions
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface HasConditions
{
    public function where(string $param, string $operator, ...$values): self;
}