<?php

namespace App\Services\Course;

use App\Models\Course;

class Service
{
    public function index($date){
        $query = Course::query();
        if (isset($date['id'])){
            $query->where('id', $date['id']);
        }
        if (isset($date['name'])){
            $query->where('name', 'like', "%{$date['name']}%");
        }
        if (isset($date['updated'])){
            $query->where('updated_at', 'like', "%{$date['updated']}%");
        }
        if (isset($date['description'])){
            $query->where('description', 'like', "%{$date['description']}%");
        }
        if (isset($date['created'])){
            $query->where('created_at', 'like', "%{$date['created']}%");
        }
        return $query->get();
    }
    public function store($data)
    {
        Course::create($data);
    }

    public function update($course, $data)
    {
        $course->update($data);
    }


}
