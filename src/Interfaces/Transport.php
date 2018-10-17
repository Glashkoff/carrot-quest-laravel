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
     * Send GET request
     *
     * @param string $method
     * @param array  $data
     *
     * @return array
     */
    public function get(string $method, array $data = []): array;

    /**
     * Send POST request
     *
     * @param string $method
     * @param array  $data
     *
     * @return array
     */
    public function post(string $method, array $data = []): array;
}