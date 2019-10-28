<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;

class Post extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'publish_date' => Carbon::createFromTimeString($this->publish_date)->format('Y-m-d'),
        ];
    }
}
