<?php
namespace Sample\classes;

trait InjectableTrait
{
    private $zaolik = null;

    /**
     * @return null
     */
    public function getZaolik()
    {
        return $this->zaolik;
    }

    /**
     * @param \Zaolik\DIContainer $zaolik
     */
    public function setZaolik(\Zaolik\DIContainer $zaolik)
    {
        $this->zaolik = $zaolik;
    }
}