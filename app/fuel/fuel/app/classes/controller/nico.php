<?php

use \Model\Nicomylists;
use \Model\Nicoitems;
use \DB as DB;

class Controller_Nico extends Controller
{

    public function action_index()
    {
        $data = [];

        if (!Auth::check() || Auth::get('email') !== 'naoki19940317@yahoo.co.jp')
        {
            return Response::forge(View::forge('404'), 404);
        }

        $mylists = [];
        foreach (Nicomylists::get_by_user_id(Auth::get('id')) ?? [] as $key => $mylist)
        {
            $mylist['items'] = Nicoitems::get_by_nico_mylist_id($mylist['id']);
            $mylists[$mylist['id']] = $mylist;
        }
        $data['mylists'] = $mylists;

        return View::forge('nico/index', $data);
    }

    public function action_mylist()
    {
        $data = [];

        return Response::forge(
            json_encode([1, 2, 3]),
            200,
            ['Content-type' => 'application/json']
        );
    }

    public function action_register()
    {
        if (!Auth::check()) {
            return self::response_json([
                    "result" => "error",
                    "message" => "404",
            ]);
        }

        $data = [];
        $mylists = Input::json();
        $user_id = Auth::get('id');
        $registered_mylists = Arr::pluck(Nicomylists::get_by_user_id($user_id),
                                         'id', 'origin_id');
        $update_mylists_id = [];

        try
        {
            DB::start_transaction();
            foreach($mylists as $mylist)
            {
                $origin_mylist_id = $mylist['origin_id'];
                $mylist_id = null;
                if (array_key_exists($origin_mylist_id, $registered_mylists))
                {
                    $mylist_id = $registered_mylists[$origin_mylist_id];
                } else
                {
                    list($mylist_id) = Nicoitems::insert([
                        'origin_id' => $mylist['id'],
                        'user_id' => Auth::get('id'),
                        'name' => $mylist['name'],
                    ]);
                }
                $update_mylists_id[] = $mylist_id;

                $registerd_origin_ids = Arr::pluck(Nicoitems::get_by_nico_mylist_id($mylist_id),
                                                   'origin_id', 'origin_id');
                foreach ($mylist['items'] ?? [] as $item)
                {
                    if (!array_key_exists($item['origin_id'], $registerd_origin_ids)) {
                        $item['nico_mylist_id'] = $mylist_id;
                        Nicoitems::insert($item);
                    }
                }
            };

            DB::commit_transaction();
        }
        catch (Exception $e)
        {
            // ロールバック
            DB::rollback_transaction();
            \Log::debug(var_export([$e->getMessage(), $e->getLine()], true));
            return self::response_json(["result" => "error", 500]);
        }

        $update_mylists = Nicomylists::get_by_ids($update_mylists_id);
        foreach($update_mylists ?? [] as $key => $mylist)
        {
            $update_mylists[$key]['items'] = Nicoitems::get_by_nico_mylist_id($mylist['id']);
        }

        return self::response_json([
            'result' => 'ok',
            'update_mylists' => $update_mylists
        ]);
    }

    private static function response_json($contents, $status = 200)
    {
        return Response::forge(
            json_encode($contents),
            $status,
            ['Content-type' => 'application/json']
        );
    }

}
