<?php
namespace App\Http;
Use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ApiController;
class ThrotleRequestResponseException extends ApiController
{
    public function __construct(){
        return 0;
    }
    public function errorMessage($message="", $code=400)
    {
        return 0;
    }
}
