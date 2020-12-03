<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    //
    protected $fillable = [
        'title', 'title', 'status', 'anime_image', 'recommend'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // アニメ情報の取得
    public function getAllAnimes()
    {
        return $this::get();
    }

    // 自分のアニメ情報の取得
    public function getAllMyanimes(Int $user_id)
    {
        return $this->where('user_id', $user_id)->paginate(12);
    }

    // アニメ情報の保存
    public function animeStore(Int $user_id, Array $data)
    {
        // 関連付け
        $this->user_id = $user_id;

        $this->title = $data['title'];
        $this->text = $data['text'];
        $this->status = $data['status'];
        $this->recommend = $data['recommend'];

        $this->save();

        return;
    }
}
