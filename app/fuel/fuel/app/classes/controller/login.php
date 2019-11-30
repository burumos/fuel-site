<?php

class Controller_Login extends Controller
{

    public function action_index()
    {

        $data = array();

        if (Input::post())
        {
            if (Auth::login())
            {
                // 認証情報は OK
                Session::set('message', 'ログインしました');
                Response::redirect(Router::get('top'));
            }
            else
            {
                $data['username']    = Input::post('username');
                $data['login_error'] = 'Wrong username/password combo. Try again';
            }
        }

        return View::forge('login/index', $data);
    }

    public function action_success()
    {
        $data = [];

        if (!Auth::check())
        {
            Response::redirect('/login');
        }
        else
        {
            $data['username'] = Auth::get('username');
        }

        return View::forge('login/success', $data);
    }

    public function action_sign_in()
    {
        $data = ['messages' => []];

        if (Input::post())
        {
            $user_name = Input::post('username');
            $password = Input::post('password');
            $email = Input::post('email');

            if (!$user_name || !$password || !$email)
            {
                $data['messages'][] = '3つは必須';
            }
            else if (\Model\Users::is_email_or_username_aleready_in_use($email, $user_name))
            {
                $data['messages'][] = 'emailまたはuser nameがすでに使わています。';
            }
            else
            {
                $result = Auth::create_user(
                    $user_name,
                    $password,
                    $email
                );
                if ($result)
                {
                    Response::redirect(Router::get('success_signin'));
                }
                else
                {
                    $data['messages'][] = 'ユーザデータ作成中にエラーが発生しました。';
                }
            }

            $data['username'] = $user_name;
            $data['email'] = $email;
        }

        return View::forge('login/sign_in', $data);
    }

    public function action_success_sign_in()
    {
        $data = [];

        return View::forge('login/success_sign_in', $data);
    }

    public function action_logout()
    {
        Auth::logout();

        Session::set('message', 'ログアウトしました。');
        Response::redirect(Router::get('top'));

        return View::forge('login/logout.php');
    }

}
