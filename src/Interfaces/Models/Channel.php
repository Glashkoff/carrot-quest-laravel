<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Channel model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Channel
{
    /**
     * Get channel id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get channel name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get channel avatar
     *
     * @return string
     */
    public function getAvatar(): string;

    /**
     * Check channel is droppable
     *
     * @return bool
     */
    public function isDroppable(): bool;

    /**
     * Get channel type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get admins
     *
     * @return array|Admin[]
     */
    public function getOperators(): array;

    /**
     * Count not assigned dialogs
     *
     * @return int
     */
    public function getNotAssignedCount(): int;

    /**
     * Count not read dialogs
     *
     * @return int
     */
    public function getNotReadCount(): int;

    /**
     * Check read permission exists
     *
     * @return bool
     */
    public function hasReadPermission(): bool;
}