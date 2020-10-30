<?php

function create($class, $attributes = [], $times = null)
{
    return call_user_func($class . '::factory')->count($times)->create($attributes);
}

function make($class, $attributes = [], $times = null)
{
    return call_user_func($class . '::factory')->count($times)->make($attributes);
}

function raw($class, $attributes = [], $times = null)
{
    return call_user_func($class . '::factory')->count($times)->raw($attributes);
}
