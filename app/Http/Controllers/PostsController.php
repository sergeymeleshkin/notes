<?php

namespace App\Http\Controllers;
use App\Repositories\Posts\PostsRepositoryInterface;

class PostsController extends Controller
{
    public function index(PostsRepositoryInterface $postsRepo) {
        return $postsRepo->get();
    }
}
