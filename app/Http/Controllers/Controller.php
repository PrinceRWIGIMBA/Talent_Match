<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

 /**
 * @OA\Info(title="My First API", version="0.1")
 */
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Talent Match API",
 *      description="Back End API Using Laravel"
 * )
 *
 */

class Controller extends BaseController
{
      
   
    use AuthorizesRequests, ValidatesRequests;


}
