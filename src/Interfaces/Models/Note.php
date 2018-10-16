<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Note model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Note
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get author
     *
     * @return Admin
     */
    public function getAuthor(): Admin;

    /**
     * Get body
     *
     * @return string
     */
    public function getBody(): string;

    /**
     * Get date note created at
     *
     * @return string
     */
    public function getCreatedAt(): string;
}