<?php

class Controller_Nico extends Controller
{

    public function action_index()
    {
        $data = [];
        if (!Auth::check() || Auth::get('email') !== 'naoki19940317@yahoo.co.jp')
        {
            Response::redirect(Router::get('_404_'));
        }

        return View::forge('top', $data);
    }

}
