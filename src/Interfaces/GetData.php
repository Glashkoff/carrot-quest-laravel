<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services to get data
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface GetData
{
    /**
     * @return array
     */
    public function get(): array;
}