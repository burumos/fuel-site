<?php

class Controller_Test extends Controller
{

    public function action_index()
    {
        return View::forge('test/index');
    }

}
