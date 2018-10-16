<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\ListService;

interface MessagesService extends ListService
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return MessagesService
     */
    public function setConversationId(int $id): self;
}