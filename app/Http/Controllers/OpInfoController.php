<?php
namespace App\Http\Controllers;

use DB;
use User;
use OpInfo;
use Request;
use OpInfoComment;
use Laravel\Lumen\Routing\Controller as BaseController;

class OpInfoController extends BaseController
{
    /**
     *
     * @param  int $id
     * @return class OpInfoComment
     */
    public function comment($id)
    {
    	$content = Request::input('content');

		DB::beginTransaction();
		// insert into dbt
		$opInfoComment             = new OpInfoComment();
		$opInfoComment->uid        = 21;
		$opInfoComment->op_info_id = $id;
		$opInfoComment->content    = $content;
		$opInfoComment->save();
		// update dbt
		$opInfo = OpInfo::find($id);
		$opInfo->comment += 1;
		$opInfo->save();

		DB::commit();
		return $opInfoComment;
    }
}
