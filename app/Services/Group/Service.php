<?php

namespace App\Services\Group;

use App\Models\Group;

class Service
{
    public function filterOne($group)
    {
        if (auth()->user()->role === 'admin'){
            return true;
        }
        $myGroups = auth()->user()->groups;
        return $myGroups->contains($group);
    }

    public function filter($groups)
    {

        $groupsFilter = $groups->filter(function ($group) {

            $myGroups = auth()->user()->groups;

            return $myGroups->contains($group);

        });
        return $groupsFilter;
    }

    public function index($date)
    {
        $query = Group::query();
        if (isset($date['id'])) {
            $query->where('id', $date['id']);
        }
        if (isset($date['name'])) {
            $query->where('name', 'like', "%{$date['name']}%");
        }
        if (isset($date['updated'])) {
            $query->where('updated_at', 'like', "%{$date['updated']}%");
        }
        if (isset($date['course'])) {
            $query->where('course_id', $date['course']);
        }
        if (isset($date['created'])) {
            $query->where('created_at', 'like', "%{$date['created']}%");
        }
        return $query->get();
    }

    public function store($data)
    {
        $users = $data['users'];
        unset($data['users']);
        $group = Group::create($data);
        $group->users()->attach($users);
    }

    public function update($group, $data)
    {
        $users = $data['users'];
        unset($data['users']);
        $group->update($data);
        $group->users()->sync($users);
    }


}
