<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for service creates and fills object
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface ObjectCreator
{
    /**
     * Create class
     *
     * @param string $class
     * @param array  $data
     *
     * @return mixed
     */
    public function create(string $class, array $data);
}