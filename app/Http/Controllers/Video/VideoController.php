<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Likedislike;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Collection;

class VideoController extends Controller
{
    public function courseShow()
    {
        $video = Video::all();

        return view('video/coursePage',['video'=>$video]);
    }

    public function videoShow($id)
    {
        $video = Video::find($id);
        $totallikes = DB::table('likedislikes')
                        ->where('video_id',$id)
                        ->where('liked',true)
                        ->count();
        $totaldislikes = DB::table('likedislikes')
                        ->where('video_id',$id)
                        ->where('liked',false)
                        ->count();

        return view('video/videoPage')
                    ->with('video',$video)
                    ->with('totallikes',$totallikes)
                    ->with('totaldislikes',$totaldislikes)
                    ;
    }

    public function like($id, $liked = true)
    {  
        $query = DB::table('likedislikes')
                        ->where('user_id',Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',true)
                        ->count();

        if($query == 0 )
        {
            $query2 = DB::table('likedislikes')
                        ->where('user_id', Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',false)
                        ->count();

            if ($query2 != 0 )
            {
                $userid = Auth::guard('web')->user()->id;
                $likedislike = DB::table('likedislikes')
                        ->where('user_id', Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',false)
                        ->update(array('liked' => true));
                // $affectedRows = User::where('votes', '>', 100)->update(array('status' => 2));
                // $likedislike->user_id = $userid;
                // $likedislike->video_id = $id;
                // $likedislike ->liked = true;

                // $likedislike->save();

                return back();
            }
            else if ($query2 == 0)
            {
            $likedislike = new Likedislike();

            $likedislike->user_id = Auth::guard('web')->user()->id;
            $likedislike->video_id = $id;
            $likedislike->liked = true;

            $likedislike->save();
  
            return back();
            }  
        }
        else //$query != 0 
        {
            return back();
        }
    }

    public function dislike($id, $liked = false)
    {
        
        $query = DB::table('likedislikes')
                        ->where('user_id',Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',false)
                        ->count();

        if($query == 0 )
        {
            $query2 = DB::table('likedislikes')
                        ->where('user_id', Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',true)
                        ->count();

            if ($query2 != 0 )
            {
                $userid = Auth::guard('web')->user()->id;
                $likedislike = DB::table('likedislikes')
                        ->where('user_id', Auth::guard('web')->user()->id)
                        ->where('video_id', $id)
                        ->where('liked',true)
                        ->update(array('liked' => false));
                // $affectedRows = User::where('votes', '>', 100)->update(array('status' => 2));
                // $likedislike->user_id = $userid;
                // $likedislike->video_id = $id;
                // $likedislike ->liked = true;

                // $likedislike->save();

                return back();
            }
            else if ($query2 == 0)
            {
            $likedislike = new Likedislike();

            $likedislike->user_id = Auth::guard('web')->user()->id;
            $likedislike->video_id = $id;
            $likedislike->liked = false;

            $likedislike->save();
  
            return back();
            }  
        }
        else //$query != 0 
        {
            return back();
        }
    }
}
