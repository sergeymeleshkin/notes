<?php

namespace Domain\Auth\Repositories\GroupUsers;
use Domain\Auth\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GroupUsersRepository implements GroupUsersRepositoryInterface
{
    protected User $model;
    public function __construct(User $model) {
        $this->model = $model;
    }
    public function get(): Collection
    {
        return $this->model->with('groups:name')
            ->select('id', 'name')
            ->get();
    }

    public function show(int $id): Collection
    {
        return $this->model->whereHas('groups', function ($query) use ($id) {
                $query->where('id', $id);
            })->with('groups')->select('id','name')->get();
    }
}
