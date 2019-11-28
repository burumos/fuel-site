<?php

class Controller_Top extends Controller
{

    public function action_index()
    {
        $data = [];
        if (Auth::check())
        {
            $data['username'] = Auth::get('username');
        }

        $data['message'] = Session::get('message');
        Session::delete('message');

        return View::forge('top', $data);
    }

}
