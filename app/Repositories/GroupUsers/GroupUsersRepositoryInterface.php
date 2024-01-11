<?php

namespace App\Repositories\GroupUsers;
interface GroupUsersRepositoryInterface
{
    public function get();
    public function show(int $id);
}
