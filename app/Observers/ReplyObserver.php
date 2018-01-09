<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

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

        $topic = $reply->topic;
        if ( !$reply->user->isAuthorOf($topic) ) {
            $topic->user->notify(new TopicReplied($reply));
        }
//        $topic->reply_count++;
//        $topic->save();

    }

    public function updating(Reply $reply)
    {
        //
    }
}