<?php

namespace Osmianski\SuperObjects;

use Osmianski\SuperObjects\Traits\LazyProperties;

#[\AllowDynamicProperties]
class SuperObject
{
    use LazyProperties;

    public function __construct(array $data = []) {
        foreach ($data as $property => $value) {
            $this->$property = $value;
        }
    }
}
