<?php
// Mapper for users
class Mapper_User extends Mapper
{
    static function minimal($user) {
        return array('username' => $user->username);
    }
    
    static function profile($user) {
        $result = static::extract_properties(
            $user,
            array('id', 'username', 'created_at')
        );
        
        /*
        profile_fields is always empty, but this is just here
        to illustrate that you can also send other information
        than object attributes.
        */
        $result['profile_fields'] = unserialize(
            $user->profile_fields
        );
        return $result;
    }
}
