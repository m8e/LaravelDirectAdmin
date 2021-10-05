<?php

namespace Octopy\DirectAdmin\Command\Admin\Collection;

use Octopy\DirectAdmin\Context\ItemCollection;

class ServerItemCollection extends ItemCollection
{
    /**
     * @return ItemCollection
     */
    public function getUptime() : ItemCollection
    {
        return new ItemCollection($this->items['uptime_info']);
    }

    /**
     * @return ItemCollection
     */
    public function getCpus() : ItemCollection
    {
        return new ItemCollection(($this->items['cpus']));
    }

    /**
     * @return ItemCollection
     */
    public function getMemInfo() : ItemCollection
    {
        return new ItemCollection(($this->items['mem_info']));
    }

    /**
     * @return int|string
     */
    public function getMemTotal() : int|string
    {
        return $this->getMemInfo()->get('MemTotal');
    }

    /**
     * @return int|string
     */
    public function getMemFree() : int|string
    {
        return $this->getMemInfo()->get('MemFree');
    }

    /**
     * @return ItemCollection
     */
    public function getMemAvailable() : ItemCollection
    {
        return $this->getMemInfo()->get('MemAvailable');
    }

    /**
     * @return ItemCollection
     */
    public function getServices() : ItemCollection
    {
        return new ItemCollection(($this->items['services']));
    }
}
