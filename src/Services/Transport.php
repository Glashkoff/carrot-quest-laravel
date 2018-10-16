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

    /**
     * @var array
     */
    private $data;

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
        $getParams = [
            'auth_token' => $this->getAuthToken(),
        ];

        if ($method === self::METHOD_GET) {
            $getParams = array_merge($getParams, $data);
            $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($getParams);
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'ProfessionalWeb.CarrotQuest.SDK/PHP');
        if ($method === self::METHOD_POST) {
            curl_setopt($curl, CURLOPT_POST, 1);
            $query = http_build_query($data);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Expect:']);
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
     * Set data to send to service
     *
     * @param array $data
     *
     * @return ITransport
     */
    public function setData(array $data): ITransport
    {
        $this->data = $data;

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

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Send GET request
     *
     * @return array
     * @throws \Exception
     */
    public function get(): array
    {
        $responseStr = $this->send(self::METHOD_GET, $this->getUrl(), $this->getData());

        return json_decode($responseStr, true);
    }

    /**
     * Send POST request
     *
     * @return array
     * @throws \Exception
     */
    public function post(): array
    {
        $responseStr = $this->send(self::METHOD_POST, $this->getUrl(), $this->getData());

        return json_decode($responseStr, true);
    }
}