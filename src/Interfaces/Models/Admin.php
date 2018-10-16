<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Admin model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Admin
{
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