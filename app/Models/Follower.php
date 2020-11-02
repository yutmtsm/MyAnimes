<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    //
    protected $primaryKey = [
        'following_id',
        'followed_id'
    ];
    protected $fillable = [
        'following_id',
        'followed_id'
    ];
    public $timestamps = false;
    public $incrementing = false;
    
    // フォローフォロワー数の取得
    public function getFollowCount(Int $user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }
    public function getFollowerCount(Int $user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
    
     // フォローしているユーザーID
    public function getFollowingUserIds($user_id)
    {
        return $this->where('following_id', $user_id)->get('followed_id');
    }
    
    // フォローされているユーザーID
    public function getFollowedUserIds($user_id)
    {
        return $this->where('followed_id', $user_id)->get('following_id');
    }
}
