<?php

namespace App\Services\Lesson;

use App\Models\Lesson;

class Service
{
    public function index($date){
        $query = Lesson::query();
        if (isset($date['id'])){
            $query->where('id', $date['id']);
        }
        if (isset($date['name'])){
            $query->where('name', 'like', "%{$date['name']}%");
        }
        if (isset($date['updated'])){
            $query->where('updated_at', 'like', "%{$date['updated']}%");
        }
        if (isset($date['course'])){
            $query->where('course_id', $date['course']);
        }
        if (isset($date['created'])){
            $query->where('created_at', 'like', "%{$date['created']}%");
        }
        return $query->get();
    }
    public function store($data)
    {
        Lesson::create($data);
    }

    public function update($lesson, $data)
    {
        $lesson->update($data);
    }


}
