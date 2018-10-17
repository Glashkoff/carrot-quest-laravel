<?php namespace professionalweb\CarrotQuest\Traits;

use professionalweb\CarrotQuest\Interfaces\HasConditions as IHasConditions;

/**
 * Trait for classes have conditions
 * @package professionalweb\CarrotQuest\Traits
 */
trait HasConditions
{
    /**
     * Conditions
     *
     * @var array
     */
    private $wheres = [];

    /**
     * @param string $param
     * @param string $operator
     * @param array  $values
     *
     * @return IHasConditions
     */
    public function where(string $param, string $operator, ...$values): IHasConditions
    {
        $this->wheres[] = [
            $param,
            $operator,
            $values,
        ];

        return $this;
    }
}