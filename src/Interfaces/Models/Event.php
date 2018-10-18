<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Event model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Event
{
    //<editor-fold desc="Event types">
    public const EVENT_REGISTRATION = '$registered';
    public const EVENT_AUTHORIZATION = '$authorized';
    public const EVENT_CART_ADDED = '$cart_added';
    public const EVENT_CART_VIEWED = '$cart_viewed';
    public const EVENT_CONVERSATION_STARTED = '$conversation_user_started';
    public const EVENT_EMAIL_CHANGED = '$email_changed';
    public const EVENT_FORM_SENDED = '$form_sended';
    public const EVENT_GOAL_COMPLETED = '$goal_completed';
    public const EVENT_INPUT_FILLED = '$input_filled';
    public const EVENT_MESSAGE_BOUNCED = '$message_bounced';
    public const EVENT_MESSAGE_CLICKED = '$message_clicked';
    public const EVENT_MESSAGE_CONTROL_GROUP = '$message_control_group';
    public const EVENT_MESSAGE_READ = '$message_read';
    public const EVENT_MESSAGE_REPLIED = '$message_replied';
    public const EVENT_MESSAGE_SENDED = '$message_sended';
    public const EVENT_MESSAGE_SPAM = '$message_spam';
    public const EVENT_MESSAGE_UNSUBSCRIBED = '$message_unsubscribed';
    public const EVENT_NAME_CHANGED = '$name_changed';
    public const EVENT_ORDER_CANCELED = '$order_cancelled';
    public const EVENT_ORDER_CLOSED = '$order_closed';
    public const EVENT_ORDER_COMPLETED = '$order_completed';
    public const EVENT_ORDER_PAID = '$order_paid';
    public const EVENT_ORDER_REFUNDED = '$order_refunded';
    public const EVENT_ORDER_STARTED = '$order_started';
    public const EVENT_PAGE_VIEW = '$page_view';
    public const EVENT_PHONE_CHANGED = '$phone_changed';
    public const EVENT_PRODUCT_VIEWED = '$product_viewed';
    public const EVENT_PUSH_SUBSCRIBED = '$push_subscribed';
    public const EVENT_PUSH_UNSUBSCRIBED = '$push_unsubscribed';
    public const EVENT_SESSION_START = '$session_start';
    public const EVENT_USER_BANNED = '$user_banned';
    public const EVENT_USER_MERGED = '$user_merged';
    public const EVENT_USER_UNBANNED = '$user_unbanned';
    public const EVENT_UTM_HIT = '$utm_hit';
    //</editor-fold>

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get date event created at
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Get event type
     *
     * @return EventType
     */
    public function getType(): EventType;

    /**
     * Get event properties
     *
     * @return array
     */
    public function getProperties(): array;
}