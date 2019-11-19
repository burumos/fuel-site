<?php

class Controller_Top extends Controller
{

    public function action_index()
    {
        $data = [];
        if (Auth::check()) {
            $data['username'] = Auth::get('username');
        }

        return View::forge('top', $data);
    }

}
