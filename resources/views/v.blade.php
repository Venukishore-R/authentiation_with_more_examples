$user = Likedislike::all();

        if($user->isEmpty())
        {
            $likedislike = new Likedislike();

            $likedislike->user_id = Auth::guard('web')->user()->id;
            $likedislike->video_id = $id;
            $likedislike->liked = $liked;

            $likedislike->save();
  
            return back();
        }
        else
        {
        $users = DB::table('likedislikes')->pluck('user_id');
        $videos = DB::table('likedislikes')->pluck('video_id');
        $likes = DB::table('likedislikes')->pluck('liked');

        foreach ($users as $user)
        {
            if( $user != Auth::guard('web')->user()->id )
            {
                $likedislike = new Likedislike();

                $likedislike->user_id = Auth::guard('web')->user()->id;
                $likedislike->video_id = $id;
                $likedislike->liked = $liked;

                $likedislike->save();
  
                return back();
            }
            foreach ($videos as $video) 
            {
                foreach($likes as $like)
                {
                    if($user == Auth::guard('web')->user()->id && $video == $id && $like == true) 
                    {
                        return 'alredy liked';
                    }
                    else if($user == Auth::guard('web')->user()->id && $video == $id && $like == false )
                    {

                        $likedislike = Likedislike::find(Auth::guard('web')->user()->id);

                        $likedislike->user_id = Auth::guard('web')->user()->id;
                        $likedislike->video_id = $id;
                        $likedislike->liked = $liked;

                        $likedislike->save();

                        return back();   
                        
                    }
                    else
                    {
                        $likedislike = new Likedislike();

                        $likedislike->user_id = Auth::guard('web')->user()->id;
                        $likedislike->video_id = $id;
                        $likedislike->liked = $liked;

                        $likedislike->save();
  
                        return back();
                    }
                }
            }
        }
        }