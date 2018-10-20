<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Property as IProperty;

class Property implements IProperty
{
    /**
     * @var string
     */
    private $operation;

    /**
     * @var string
     */
    private $param;

    /**
     * @var mixed
     */
    private $value;

    public function __construct(string $operation = '', string $param = '', $value = null)
    {
        $this->setOperation($operation)->setParam($param)->setValue($value);
    }

    /**
     * Get operation
     *
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * Get property name
     *
     * @return string
     */
    public function getParam(): string
    {
        return $this->param;
    }

    /**
     * Get value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $operation
     *
     * @return $this
     */
    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * @param string $param
     *
     * @return $this
     */
    public function setParam(string $param): self
    {
        $this->param = $param;

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'op'    => $this->getOperation(),
            'key'   => $this->getParam(),
            'value' => $this->getValue(),
        ];
    }
}