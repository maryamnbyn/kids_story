<?php
/**
 * Created by PhpStorm.
 * User: Pouya Teymoorian
 * Date: 7/21/2019
 * Time: 10:06 AM
 */

namespace App\Http\Services\Response;
use Illuminate\Support\Facades\Facade;

class ResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ResponseJson';
    }
}