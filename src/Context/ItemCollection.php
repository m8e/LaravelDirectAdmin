<?php

namespace Octopy\DirectAdmin\Context;

use Illuminate\Support\Collection;
use Illuminate\Support\HigherOrderCollectionProxy;
use JetBrains\PhpStorm\NoReturn;

class ItemCollection extends Collection
{
    /**
     * @param  ItemCollection|array $items
     */
    #[NoReturn]
    public function __construct(ItemCollection|array $items)
    {
        if ($items instanceof ItemCollection) {
            $items = $items->toArray();
        }

        parent::__construct($items);
    }

    /**
     * @param  string $key
     * @return HigherOrderCollectionProxy|mixed
     */
    public function __get($key)
    {
        return $this->items[$key];
    }
}
