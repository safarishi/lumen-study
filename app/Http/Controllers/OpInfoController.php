<?php
namespace App\Http\Controllers;

use DB;
use Request;
use OpInfoComment;
use Laravel\Lumen\Routing\Controller as BaseController;

class OpInfoController extends BaseController
{
    // comment
    // todo
    public function comment($id)
    {
    	$content = Request::input('content');
    	return OpInfoComment::find(3);
    	// todo
    }
}
