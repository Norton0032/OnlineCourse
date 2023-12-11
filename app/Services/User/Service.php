<?php

namespace App\Services\User;

use App\Models\User;

class Service
{

    public function filter($users)
    {


        $usersFilter = $users->filter(function ($user) {

            $groups = $user->groups;
            $myGroup = auth()->user()->groups;

            return $groups->intersect($myGroup)->isNotEmpty() ? true : false;

        });
        return $usersFilter;
    }

    public function index($date)
    {
        $query = User::query();
        if (isset($date['id'])) {
            $query->where('id', $date['id']);
        }
        if (isset($date['name'])) {
            $query->where('name', 'like', "%{$date['name']}%");
        }
        if (isset($date['email'])) {
            $query->where('email', 'like', "%{$date['email']}%");
        }
        if (isset($date['updated'])) {
            $query->where('updated_at', 'like', "%{$date['updated']}%");
        }
        if (isset($date['role'])) {
            $query->where('role', $date['role']);
        }
        if (isset($date['created'])) {
            $query->where('created_at', 'like', "%{$date['created']}%");
        }
        return $query->get();
    }

    public function store($data)
    {
        $groups = $data['groups'];
        unset($data['groups']);
        $user = User::create($data);
        $user->groups()->attach($groups);
    }

    public function update($user, $data)
    {
        $groups = $data['groups'];
        unset($data['groups']);
        $user->name = $data['name'];
        $user->role = $data['role'];
        $user->save();
        $user->groups()->sync($groups);
    }


}
