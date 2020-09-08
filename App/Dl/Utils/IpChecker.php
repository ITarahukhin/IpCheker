<?php

namespace App\Dl\Utils;

/**
 * Class ipChecker
 */
class IpChecker
{
    /**
     * @var mixed|null
     */
    private $ip;

    /**
     * @var mixed|null
     */
    private $network;

    /**
     * @var
     */
    private $mask;

    /**
     * ipChecker constructor.
     * @param string|null $ip
     * @param string|null $network
     * @param int|null $mask
     */
    public function __construct($ip = null, $network = null, $mask = null)
    {
        $this->ip = $ip;
        $this->network = $network;

        if (strpos($network, "/") !== false) {
            $this->mask = substr($network, strpos($network, "/"));
        } else{
            $this->mask = $mask;
        }
    }

    /**
     * @return bool
     */
    public function check()
    {
        $network_long = ip2long($this->network);
        $ip_long = ip2long($this->ip);
        $x = ip2long($this->mask);
        $mask = long2ip($x) == $this->mask ? $x : 0xffffffff << (32 - $this->mask);
        if (($ip_long & $mask) == ($network_long & $mask)) {
            return true;
        }

        return false;
    }

    /**
     * @param $ip
     * @return mixed|null
     */
    public function getIp($ip)
    {
        return $this->ip;
    }

    /**
     * @param $ip
     * @return IpChecker
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @param $network
     * @return mixed|null
     */
    public function getNetwork($network)
    {
        return $this->network;
    }

    /**
     * @param $network
     * @return IpChecker
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * @param $mask
     * @return mixed
     */
    public function getMask($mask)
    {
        return $this->mask;
    }

    /**
     * @param $mask
     * @return IpChecker
     */
    public function setMask($mask)
    {
        $this->mask = $mask;

        return $this;
    }

}