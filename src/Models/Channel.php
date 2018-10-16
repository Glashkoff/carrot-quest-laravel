<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Admin;
use professionalweb\CarrotQuest\Interfaces\Models\Channel as IChannel;

/**
 * Channel model
 * @package professionalweb\CarrotQuest\Models
 */
class Channel implements IChannel
{

    //<editor-fold desc="Fields">
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var bool
     */
    private $isDropable;

    /**
     * @var array
     */
    private $operators;

    /**
     * @var int
     */
    private $notAssignedCount;

    /**
     * @var int
     */
    private $notReadCount;

    /**
     * @var bool
     */
    private $hasReadPermission;

    /**
     * @var string
     */
    private $type;
    //</editor-fold>

    /**
     * Get channel id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get channel name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get channel avatar
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Check channel is droppable
     *
     * @return bool
     */
    public function isDroppable(): bool
    {
        return $this->isDropable;
    }

    /**
     * Get channel type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get admins
     *
     * @return array|Admin[]
     */
    public function getOperators(): array
    {
        return $this->operators;
    }

    /**
     * Count not assigned dialogs
     *
     * @return int
     */
    public function getNotAssignedCount(): int
    {
        return $this->notAssignedCount;
    }

    /**
     * Count not read dialogs
     *
     * @return int
     */
    public function getNotReadCount(): int
    {
        return $this->notReadCount;
    }

    /**
     * Check read permission exists
     *
     * @return bool
     */
    public function hasReadPermission(): bool
    {
        return $this->hasReadPermission;
    }
}