<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        //XSS 过滤
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function created(Reply $reply)
    {
        $reply->topic->increment('reply_count', 1);
//        $topic = $reply->topic;
//        $topic->reply_count++;
//        $topic->save();
    }

    public function updating(Reply $reply)
    {
        //
    }
}