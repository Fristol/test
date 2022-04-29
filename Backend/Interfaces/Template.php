<?php

namespace Interfaces;
interface Template
{
    public static function getAll();

    public static function add($key, $value);

    public static function delete($key);
}