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

	/**
	 *
	 * @param  int $id
	 */
	public function comments($id)
	{
		// 临时存储数据库中查询的数据，在后面的foreach中使用
		$tmp_data_arr = User::select('id', 'username', 'avatar')->get()->toArray();
		// 要返回的数据
		$datas = DB::table('op_info_comment')
			->select('id', 'uid', 'content', 'op_info_id', 'created_at')
			->where('op_info_id', $id)
			->orderBy('created_at', 'desc')
			->get();

		foreach ($tmp_data_arr as $value) {
			foreach ($datas as $_v) {
				if ($_v->uid === $value['id']) {
					$_v->user_name = $value['username'];
					$_v->user_avatar = $value['avatar'];
				}
			}
		}
		return $datas;
	}
}
