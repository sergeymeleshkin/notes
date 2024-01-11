<?php

namespace Database\Seeders;

use App\Helpers\FilesystemHelpers;
use Domain\Auth\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    private mixed $content = [];
    function __construct(){
        $this->content = FilesystemHelpers::getResource('/json/Users.json');
    }
    public function run(): void
    {
        if(!User::count()){
            foreach($this->content->list as $user){
                User::create((array)$user);
            }
        }
    }
}
