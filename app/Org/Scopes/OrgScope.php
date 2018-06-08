<?php

namespace App\Org\Scopes;

use App\Org;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrgScope implements Scope
{

    protected $org;

    public function __construct(Org $org)
    {
        $this->org = $org->id;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where($this->org->getForeignKey(), '=', $this->org->getPrimaryKey());
    }
}
