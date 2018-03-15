<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{

    public function created(Reply $reply)
    {
        $topic = $reply->topic;
        $topic->increment('reply_count', 1);

        $topic->user->notify(new TopicReplied($reply));
    }
    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }


    public function updating(Reply $reply)
    {
        //
    }
}