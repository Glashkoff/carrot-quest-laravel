<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\GetData;

/**
 * Interface for service to get user data
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface GetUserService extends GetData
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return GetUserService
     */
    public function setUserId(int $userId): self;

    /**
     * Do not use system id
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function byUserId(bool $flag = true): self;

    /**
     * Show properties
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showProperties(bool $flag = true): self;

    /**
     * Show properties belong to events
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showEventProperties(bool $flag = true): self;

    /**
     * Show custom properties
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showCustomProperties(bool $flag = true): self;

    /**
     * Show status details
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showStatusDetails(bool $flag = true): self;

    /**
     * Show segments
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showSegments(bool $flag = true): self;

    /**
     * Show notes
     *
     * @param bool $flag
     *
     * @return GetUserService
     */
    public function showNotes(bool $flag = true): self;
}