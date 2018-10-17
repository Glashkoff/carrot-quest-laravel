<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services have conditions
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface HasConditions
{
    /**
     * Add conditions
     *
     * @param string $param
     * @param string $operator
     * @param mixed  $value
     *
     * @return HasConditions
     */
    public function where(string $param, string $operator, $value): self;

    /**
     * Where param is empty
     *
     * @param string $param
     *
     * @return HasConditions
     */
    public function whereEmpty(string $param): self;

    /**
     * Where param not empty
     *
     * @param string $param
     *
     * @return HasConditions
     */
    public function whereNotEmpty(string $param): self;

    /**
     * Where condition not strict
     *
     * @param string $param
     * @param string $operator
     * @param mixed  ...$value
     *
     * @return HasConditions
     */
    public function whereNotStrict(string $param, string $operator, $value): self;

    /**
     * Where value between $value1 and $value2
     *
     * @param string $param
     * @param        $value1
     * @param        $value2
     *
     * @return HasConditions
     */
    public function whereBetween(string $param, $value1, $value2): self;

    /**
     * Where param contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return HasConditions
     */
    public function whereContains(string $param, string $value): self;

    /**
     * Where param not contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return HasConditions
     */
    public function whereNotContains(string $param, string $value): self;

    /**
     * Where value in list
     *
     * @param string $param
     * @param        $value
     *
     * @return HasConditions
     */
    public function whereInList(string $param, $value): self;

    /**
     * Set type. "or" or "and"
     *
     * @param string $type
     *
     * @return HasConditions
     */
    public function type(string $type): self;
}