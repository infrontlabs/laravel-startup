<?php

function link_is_active($path)
{
    return request()->is($path) ? 'active' : '';
}
