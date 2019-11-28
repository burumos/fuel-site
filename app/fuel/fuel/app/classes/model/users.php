<?php

namespace Model;

class Users extends \Model {

    // emailまたはusernameが使用済みかどうか
    public static function is_email_or_username_aleready_in_use($email, $username)
    {
        $result = \DB::select('id')
            ->from('users')
            ->where('username', $username)
            ->or_where('email', $email)
            ->limit(1)
            ->execute();

        return !!count($result);
    }
}
