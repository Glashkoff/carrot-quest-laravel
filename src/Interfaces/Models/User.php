<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for User
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface User
{
    public const STATUS_ONLINE = 'online';

    public const STATUS_IDLE = 'idle';

    //<editor-fold desc="User properties">
    public const PROPERTY_NAME = '$name';
    public const PROPERTY_EMAIL = '$email';
    public const PROPERTY_PHONE = '$phone';
    public const PROPERTY_CART_AMOUNT = '$cart_amount';
    public const PROPERTY_VIEWED_PRODUCTS = '$viewed_products';
    public const PROPERTY_CART_ITEMS = '$cart_items';
    public const PROPERTY_LAST_ORDER_STATUS = '$last_order_status';
    public const PROPERTY_LAST_PAYMENT = '$last_payment';
    public const PROPERTY_REVENUEW = '$revenue';
    public const PROPERTY_PROFIT = '$profit';
    public const PROPERTY_GROUP = '$group';
    public const PROPERTY_DISCOUNT = '$discount';
    public const PROPERTY_ORDERS_COUNT = '$orders_count';
    public const PROPERTY_ORDER_ITEMS = '$ordered_items';
    public const PROPERTY_ORDERED_CATEGORIES = '$ordered_categories';
    public const PROPERTY_VIEWED_CATEGORIES = '$viewed_categories';
    //</editor-fold>

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get user id
     *
     * @return string
     */
    public function getUserId(): string;

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Get status details
     *
     * @return array
     */
    public function getStatusDetails(): array;

    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties(): array;

    /**
     * Get custom properties
     *
     * @return array
     */
    public function getCustomProperties(): array;

    /**
     * Get events properties
     *
     * @return array
     */
    public function getEventProperties(): array;

    /**
     * Get events
     *
     * @return array|Event[]
     */
    public function getEvents(): array;

    /**
     * Get segments
     *
     * @return array|Segment[]
     */
    public function getSegments(): array;

    /**
     * Get notes
     *
     * @return array|Note[]
     */
    public function getNotes(): array;
}