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
     * @var string
     */
    private $type = 'and';

    /**
     * Add conditions
     *
     * @param string $param
     * @param string $operator
     * @param mixed  $value
     *
     * @return IHasConditions
     */
    public function where(string $param, string $operator, $value): IHasConditions
    {

    }

    protected function getOperator(string $operator, $value): string
    {
        switch ($operator) {
            case '=':
                return $this->equal($value);
            case'!=':
                return $this->notEqual($value);
            case '>':
                return $this->greater()
        }
    }

    /**
     * Get equal operand
     *
     * @param $value
     *
     * @return string
     * @throws \Exception
     */
    protected function equal($value): string
    {
        if (\is_bool($value)) {
            return $value ? 'bool_true' : 'bool_false';
        }
        if (\is_numeric($value)) {
            return 'eq';
        }
        if (\is_string($value)) {
            return 'str_eq';
        }
        throw new \Exception('Wrong operator for type');
    }

    /**
     * Get not equal operand
     *
     * @param $value
     *
     * @return string
     * @throws \Exception
     */
    protected function notEqual($value): string
    {
        if (\is_bool($value)) {
            return $this->equal(!$value);
        }
        if (\is_numeric($value)) {
            return 'neq';
        }
        if (\is_string($value)) {
            return 'str_neq';
        }
        throw new \Exception('Wrong operator for type');
    }

    /**
     * Greater than
     *
     * @param bool $strict
     *
     * @return string
     */
    protected function greater(bool $strict = true): string
    {
        return $strict ? 'gt' : 'gt_or_unknown';
    }

    /**
     * Less than
     *
     * @param bool $strict
     *
     * @return string
     */
    protected function less(bool $strict = true): string
    {
        return $strict ? 'lt' : 'lt_or_unknown';
    }

    /**
     * Where param is empty
     *
     * @param string $param
     *
     * @return IHasConditions
     */
    public function whereEmpty(string $param): IHasConditions;

    /**
     * Where param not empty
     *
     * @param string $param
     *
     * @return IHasConditions
     */
    public function whereNotEmpty(string $param): IHasConditions;

    /**
     * Where condition not strict
     *
     * @param string $param
     * @param string $operator
     * @param mixed  ...$value
     *
     * @return IHasConditions
     */
    public function whereNotStrict(string $param, string $operator, $value): IHasConditions;

    /**
     * Where value between $value1 and $value2
     *
     * @param string $param
     * @param        $value1
     * @param        $value2
     *
     * @return IHasConditions
     */
    public function whereBetween(string $param, $value1, $value2): IHasConditions;

    /**
     * Where param contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return IHasConditions
     */
    public function whereContains(string $param, string $value): IHasConditions;

    /**
     * Where param not contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return IHasConditions
     */
    public function whereNotContains(string $param, string $value): IHasConditions;

    /**
     * Where value in list
     *
     * @param string $param
     * @param        $value
     *
     * @return IHasConditions
     */
    public function whereInList(string $param, $value): IHasConditions;

    /**
     * Set type
     *
     * @param string $type
     *
     * @return IHasConditions
     */
    public function type(string $type): IHasConditions
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get conditions
     *
     * @return array
     */
    public function getConditions(): array
    {
        return $this->wheres;
    }

    public function getFilter(): array
    {
        $conditions = $this->getConditions();
        if (empty($conditions)) {
            return [];
        }

        $result = [
            'type'    => $this->getType(),
            'filters' => [],
        ];

        foreach ($conditions as $condition) {
            $result['filters'][] = [
                'property_name' => $condition[0],
                'type'          => $condition[1],
                'value'         => $condition[2],
            ];
        }

        return $result;
    }
}