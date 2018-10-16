<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Attachment model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Attachment
{
    public const TYPE_FILE = 'file';

    /**
     * Get attachment id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get file size
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * Get file name
     *
     * @return string
     */
    public function getFilename(): string;

    /**
     * Get file MIME-type
     *
     * @return string
     */
    public function getMimeType(): string;

    /**
     * Get file url
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get attachment type
     *
     * @return string
     */
    public function getType(): string;
}