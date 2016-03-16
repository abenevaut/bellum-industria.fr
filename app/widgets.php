<?php
namespace App;

use Widget;

Widget::register('small', function($contents)
{
    return "<small>{$contents}</small>";
});
