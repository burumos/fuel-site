<?php

namespace Model;
use \DB as DB;

class Nicomylists extends \Model {
    const COLUMNS = [
        'id',
        'origin_id',
        'name',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public static function insert($mylist)
    {
        $mylist = \Arr::filter_keys($mylist, self::COLUMNS);

        return DB::insert('nico_mylists')
            ->set($mylist)
            ->execute();
    }

    public static function update($mylist)
    {
    }

    public static function exists_mylists($origin_id, $user_id)
    {
        $result = DB::select('id')
            ->from('nico_mylists')
            ->where('origin_id', $origin_id)
            ->and_where('user_id', $user_id)
            ->limit(1)
            ->execute();

        return !!count($result);
    }

    public static function get_by_user_id($user_id)
    {
        $result = DB::select('*')
                ->from('nico_mylists')
                ->where('user_id', $user_id)
                ->execute();

        return $result->as_array();
    }

    public static function get_by_ids($ids)
    {
        $result = DB::select('*')
                ->from('nico_mylists')
                // ->where('id', 'in', '('.implode(',', $ids).')')
                ->where('id', 'in', $ids)
                ->execute();

        return $result->as_array();
    }

}
