<?php

function create($class, $attributes = [])
{
    return call_user_func($class . '::factory')->create($attributes);
}

function make($class, $attributes = [])
{
    return call_user_func($class . '::factory')->make($attributes);
}

function raw($class, $attributes = [])
{
    return call_user_func($class . '::factory')->raw($attributes);
}
