<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Models\Conversation;

/**
 * Interface for service to work with conversations
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface ConversationService
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ConversationService
     */
    public function setConversationId(int $id): self;

    /**
     * Get service to work with messages in conversation
     *
     * @return MessagesService
     */
    public function messages(): MessagesService;

    /**
     * Get service to send messages to conversation
     *
     * @return ReplyService
     */
    public function reply(): ReplyService;

    /**
     * Mark conversation is read
     *
     * @return MarkReadService
     */
    public function markRead(): MarkReadService;

    /**
     * Set someone typing
     *
     * @return TypingService
     */
    public function setTyping(): TypingService;

    /**
     * Get assign service
     *
     * @return AssignService
     */
    public function assign(): AssignService;

    /**
     * Get tag service
     *
     * @return TagService
     */
    public function tag(): TagService;

    /**
     * Get service to close conversation
     *
     * @return CloseService
     */
    public function close(): CloseService;

    /**
     * Get conversation
     *
     * @return Conversation
     */
    public function get(): Conversation;
}