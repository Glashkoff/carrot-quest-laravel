<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for transport to communicate with CarrotQuest service
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface Transport
{
    public const METHOD_GET = 'get';

    public const METHOD_POST = 'post';

    /**
     * Set url to send request
     *
     * @param string $url
     *
     * @return Transport
     */
    public function setUrl(string $url): self;

    /**
     * Set auth token
     *
     * @param string $token
     *
     * @return Transport
     */
    public function setAuthToken(string $token): self;

    /**
     * Set data to send to service
     *
     * @param array $data
     *
     * @return Transport
     */
    public function setData(array $data): self;

    /**
     * Send GET request
     *
     * @return array
     */
    public function get(): array;

    /**
     * Send POST request
     *
     * @return array
     */
    public function post(): array;
}