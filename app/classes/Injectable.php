<?php
namespace Sample\classes;
interface Injectable
{
    public function setZaolik(\Zaolik\DIContainer $zaolik);
    public function getZaolik();
}