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
     * @throws \Exception
     */
    public function where(string $param, string $operator, $value): IHasConditions
    {
        $this->prepareCondition($operator, $value);

        return $this->addWhere($operator, $param, $value);
    }

    /**
     * Map user condition to CarrotQuest condition
     *
     * @param string $operator
     * @param        $value
     * @param bool   $strict
     *
     * @throws \Exception
     */
    protected function prepareCondition(string &$operator, &$value, bool $strict = true): void
    {
        $isDate = \is_string($value) && strtotime($value) !== false;
        if (\is_bool($value)) {
            $operator = $value ? 'bool_true' : 'bool_false';
        } elseif (\is_numeric($value) || \is_array($value)) {
            switch ($operator) {
                case '=':
                    $operator = 'eq';
                    $value = ['value' => $value];
                    break;
                case '!=':
                    $operator = 'neq';
                    $value = ['value' => $value];
                    break;
                case '>':
                    $operator = $strict ? 'gt' : 'gt_or_unknown';
                    $value = ['value' => $value];
                    break;
                case '<':
                    $operator = $strict ? 'lt' : 'lt_or_unknown';
                    $value = ['value' => $value];
                    break;
                case 'in':
                    $operator = 'range';
                    $value = ['value1' => $value[0], 'value2' => $value[1]];
                    break;
                case 'unknown':
                case 'empty':
                    $operator = 'unknown';
                    $value = [];
                    break;
                case 'known':
                case '!empty':
                    $operator = 'known';
                    $value = [];
                    break;
                default:
                    throw new \Exception('Wrong operator for type');
            }
        } elseif ($isDate) {
            $valParts = explode(' ', $value);
            $value = ['value' => $value[0], 'unit' => $valParts[1] ?? 'days'];
            switch ($operator) {
                case '>':
                    $operator = $strict ? 'daysmore' : 'daysmore_or_unknown';
                    break;
                case '<':
                    $operator = $strict ? 'daysless' : 'daysless_or_unknown';
                    break;
                case 'unknown':
                case 'empty':
                    $operator = 'unknown';
                    $value = [];
                    break;
                case 'known':
                case '!empty':
                    $operator = 'known';
                    $value = [];
                    break;
                default:
                    throw new \Exception('Wrong operator for type');
            }
        } elseif (\is_string($value)) {
            $value = ['value' => $value];
            switch ($operator) {
                case '=':
                    $operator = 'str_eq';
                    break;
                case '!=':
                    $operator = 'str_neq';
                    break;
                case 'contains':
                    $operator = 'str_contains';
                    break;
                case '!contains':
                    $operator = 'str_notcontains';
                    break;
                case 'unknown':
                case 'empty':
                    $operator = 'unknown';
                    $value = [];
                    break;
                case 'known':
                case '!empty':
                    $operator = 'known';
                    $value = [];
                    break;
                default:
                    throw new \Exception('Wrong operator for type');
            }
        }
    }

    /**
     * Add condition
     *
     * @param string $type
     * @param string $param
     * @param mixed  $value
     *
     * @return IHasConditions
     */
    protected function addWhere(string $type, string $param, $value = []): IHasConditions
    {
        $this->wheres[] = [
            'type'          => $type,
            'property_name' => $param,
            'value'         => $value,
        ];

        return $this;
    }

    /**
     * Where param is empty
     *
     * @param string $param
     *
     * @return IHasConditions
     */
    public function whereEmpty(string $param): IHasConditions
    {
        return $this->addWhere('unknown', $param);
    }

    /**
     * Where param not empty
     *
     * @param string $param
     *
     * @return IHasConditions
     */
    public function whereNotEmpty(string $param): IHasConditions
    {
        return $this->addWhere('known', $param);
    }

    /**
     * Where condition not strict
     *
     * @param string $param
     * @param string $operator
     * @param mixed  ...$value
     *
     * @return IHasConditions
     * @throws \Exception
     */
    public function whereNotStrict(string $param, string $operator, $value): IHasConditions
    {
        $this->prepareCondition($operator, $value, false);

        return $this->addWhere($operator, $param, $value);
    }

    /**
     * Where value between $value1 and $value2
     *
     * @param string $param
     * @param        $value1
     * @param        $value2
     *
     * @return IHasConditions
     */
    public function whereBetween(string $param, $value1, $value2): IHasConditions
    {
        return $this->addWhere('range', $param, [
            'value1' => $value1,
            'value2' => $value2,
        ]);
    }

    /**
     * Where param contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return IHasConditions
     */
    public function whereContains(string $param, string $value): IHasConditions
    {
        return $this->addWhere('str_contains', $param, [
            'value' => $value,
        ]);
    }

    /**
     * Where param not contains string
     *
     * @param string $param
     * @param string $value
     *
     * @return IHasConditions
     */
    public function whereNotContains(string $param, string $value): IHasConditions
    {
        return $this->addWhere('str_notcontains', $param, [
            'value' => $value,
        ]);
    }

    /**
     * Where value in list
     *
     * @param string $param
     * @param        $value
     *
     * @return IHasConditions
     */
    public function whereInList(string $param, $value): IHasConditions
    {
        return $this->addWhere('lcontains', $param, [
            'value' => $value,
        ]);
    }

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

    /**
     * Get filter
     *
     * @return array
     */
    public function getFilter(): array
    {
        $conditions = $this->getConditions();
        if (empty($conditions)) {
            return [];
        }

        return [
            'type'    => $this->getType(),
            'filters' => $conditions,
        ];
    }
}