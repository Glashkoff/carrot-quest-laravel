<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

interface MarkReadService extends Sendable
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return MarkReadService
     */
    public function setConversationId(int $id): self;
}