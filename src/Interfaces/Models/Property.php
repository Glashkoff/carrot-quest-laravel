<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface for user property
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Property extends Arrayable
{
    public const OPERATION_UPDATE_OR_CREATE = 'update_or_create';

    public const OPERATION_SET_ONCE = 'set_once';

    public const OPERATION_ADD = 'add';

    public const OPERATION_DELETE = 'delete';

    public const OPERATION_APPEND = 'append';

    public const OPERATION_UNION = 'union';

    public const OPERATION_EXCLUDE = 'exclude';

    /**
     * Get operation
     *
     * @return string
     */
    public function getOperation(): string;

    /**
     * Get property name
     *
     * @return string
     */
    public function getParam(): string;

    /**
     * Get value
     *
     * @return mixed
     */
    public function getValue();
}