<?php namespace professionalweb\CarrotQuest\Services;

use professionalweb\CarrotQuest\Interfaces\Transport as ITransport;

/**
 * Class Transport
 * @package professionalweb\CarrotQuest\Services
 */
class Transport implements ITransport
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $authToken;

    public function __construct(string $url = '', string $authToken = '')
    {
        $this->setUrl($url)->setAuthToken($authToken);
    }

    /**
     * Send request
     *
     * @param string $method
     * @param string $url
     * @param array  $data
     *
     * @return string
     * @throws \Exception
     */
    protected function send(string $method, string $url, array $data = []): string
    {
        $data['auth_token'] = $this->getAuthToken();

        if ($method === self::METHOD_GET) {
            $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($data);
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'ProfessionalWeb.CarrotQuest.SDK/PHP');
        if ($method === self::METHOD_POST) {
            curl_setopt($curl, CURLOPT_POST, 1);
//            $query = http_build_query($data);
            $query = json_encode($data);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Expect:', 'Content-Type: application/json']);
        $body = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error) {
            throw new \Exception($error);
        }

        if ($status >= 300) {
            throw new \Exception($status);
        }

        return (string)$body;
    }

    /**
     * Send GET request
     *
     * @param string $method
     * @param array  $data
     *
     * @return array
     * @throws \Exception
     */
    public function get(string $method, array $data = []): array
    {
        $responseStr = $this->send(self::METHOD_GET, $this->prepareUrl($method), $data);

        return json_decode($responseStr, true);
    }

    /**
     * Send POST request
     *
     * @param string $method
     * @param array  $data
     *
     * @return array
     * @throws \Exception
     */
    public function post(string $method, array $data = []): array
    {
        $responseStr = $this->send(self::METHOD_POST, $this->prepareUrl($method), $data);

        return json_decode($responseStr, true);
    }

    /**
     * Get full url to method
     *
     * @param string $method
     *
     * @return string
     */
    protected function prepareUrl(string $method): string
    {
        return rtrim($this->getUrl(), '/') . '/' . ltrim($method, '/');
    }

    /**
     * Set url to send request
     *
     * @param string $url
     *
     * @return ITransport
     */
    public function setUrl(string $url): ITransport
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set auth token
     *
     * @param string $token
     *
     * @return ITransport
     */
    public function setAuthToken(string $token): ITransport
    {
        $this->authToken = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }
}