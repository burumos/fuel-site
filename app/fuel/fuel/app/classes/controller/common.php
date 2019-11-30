<?php

class Controller_Common extends Controller
{

    public function action_top()
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

    public function action_404()
    {
        return View::forge('404');
    }

}
