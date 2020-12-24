<?php
// Mapper for posts
class Mapper_Post extends Mapper
{    
    static function item($post) {
        $result = static::extract_properties(
            $post,
            array('id', 'content', 'created_at')
        );
        $result['user'] = Mapper_User::get(
            'minimal',
            $post->user
        );
        return $result;
    }
}
