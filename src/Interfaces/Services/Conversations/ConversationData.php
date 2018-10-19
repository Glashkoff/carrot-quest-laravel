<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Models\Conversation;

interface ConversationData
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ConversationData
     */
    public function setConversationId(int $id): self;

    /**
     * Get conversation
     *
     * @return Conversation
     */
    public function get(): Conversation;
}