<?php namespace professionalweb\CarrotQuest\Traits;

use professionalweb\CarrotQuest\Interfaces\Transport;

/**
 * Trait for services use Transport
 * @package professionalweb\CarrotQuest\Traits
 */
trait UseTransport
{
    /**
     * @var Transport
     */
    private $transport;

    /**
     * @return Transport
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

    /**
     * @param Transport $transport
     *
     * @return $this
     */
    public function setTransport(Transport $transport): self
    {
        $this->transport = $transport;

        return $this;
    }


}