<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\GetData;

interface ConversationData extends GetData
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ConversationData
     */
    public function setConversationId(int $id): self;
}