<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to work with tags
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface TagService extends Sendable
{
    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return TagService
     */
    public function tag(string $tag): self;

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return TagService
     */
    public function setAdminId(int $adminId): self;

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return TagService
     */
    public function setBotName(string $botName): self;

    /**
     * Delete tag
     *
     * @return bool
     */
    public function delete(): bool;
}