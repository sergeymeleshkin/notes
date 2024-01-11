<?php

namespace Database\Seeders;

use App\Helpers\FilesystemHelpers;
use Domain\Auth\Models\User;
use Illuminate\Database\Seeder;

class SyncUserGroupSeeder extends Seeder
{
    private mixed $content = [];
    function __construct(){
        $this->content = FilesystemHelpers::getResource('/json/UserGroup.json');
    }
    public function run(): void
    {
        foreach($this->content->list as $userGroup){
            $user = User::where('id', $userGroup->user_id)->first();
            $user?->groups()->sync([
                $userGroup->group_id
            ]);
        }
    }
}
