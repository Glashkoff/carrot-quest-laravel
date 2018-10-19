<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\ListService;

interface MarkReadService extends ListService
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