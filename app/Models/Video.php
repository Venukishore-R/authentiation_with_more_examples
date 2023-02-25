<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable =  [
        'videoName',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select video_id, sum(liked) likes, sum(!liked) dislikes FROM likes group by video_id',
            'likes',
            'likes.video_id',
            'videos.id',
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
                'user_id'=> $user ? $user->id : auth()->id(),
            ],
            [
                'liked'=>$liked,
            ]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }


    public function isLikedBy(User $user)
    {
        return (bool) $user->likes()
                          ->where('video_id', $this->id)
                          ->where('liked',true)
                          ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes()
                          ->where('video_id', $this->id)
                          ->where('liked',false)
                          ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

