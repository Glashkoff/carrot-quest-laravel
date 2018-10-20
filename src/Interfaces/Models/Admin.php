<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Admin model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Admin
{
    public const TYPE_ADMIN = 'admin';

    public const TYPE_DEFAULT_ADMIN = 'default_admin';

    public const TYPE_BOT = 'bot';

    /**
     * Get admin id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get admin name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get admin avatar
     *
     * @return string
     */
    public function getAvatar(): string;

    /**
     * Get admin type
     *
     * @return string
     */
    public function getType(): string;
}