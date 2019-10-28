<?php

namespace App\Http\Resources;

class Post extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'publish_date' => $this->publish_date,
        ];
    }
}
