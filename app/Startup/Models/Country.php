<?php

namespace Startup\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    string                          $code
 */
class Country extends Model implements \JsonSerializable
{

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['code']                 = $this->code;

        return $object;
    }

}
