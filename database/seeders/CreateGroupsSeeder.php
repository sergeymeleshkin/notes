<?php

namespace Database\Seeders;

use App\Helpers\FilesystemHelpers;
use Domain\Auth\Models\Group;
use Illuminate\Database\Seeder;

class CreateGroupsSeeder extends Seeder
{
    private mixed $content = [];
    function __construct(){
        $this->content = FilesystemHelpers::getResource('/json/Groups.json');
    }
    public function run(): void
    {
        if(!Group::count()){
            foreach($this->content->list as $group){
                Group::create((array)$group);
            }
        }
    }
}
