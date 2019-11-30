<?php

namespace Model;
use \DB as DB;

class Nicoitems extends \Model
{
    const COLUMNS = [
        'id',
        'title',
        'nico_mylist_id',
        'video_time',
        'origin_id',
        'origin_image_src',
        'published_at',
        'created_at',
        'updated_at',
    ];


    public static function insert($item)
    {
        $item = \Arr::filter_keys($item, self::COLUMNS);

        return DB::insert('nico_items')
            ->set($item)
            ->execute();
    }

    public static function get_by_nico_mylist_id($nico_mylist_id)
    {
        $result = DB::select('*')
                ->from('nico_items')
                ->where('nico_mylist_id', $nico_mylist_id)
                ->execute();

        return $result->as_array();
    }

}
