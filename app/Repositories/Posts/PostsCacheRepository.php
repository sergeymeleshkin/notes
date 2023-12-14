<?php

namespace App\Repositories\Posts;
use Illuminate\Cache\CacheManager;
class PostsCacheRepository implements PostsRepositoryInterface
{
    protected PostsRepository $repo;
    protected CacheManager $cache;
    const TTL = 1440; # 1 day
    public function __construct(CacheManager $cache, PostsRepository $repo) {
        $this->repo = $repo;
        $this->cache = $cache;
    }
    public function get() {
        return $this->cache->remember('posts', self::TTL, function () {
            return $this->repo->get();
        });
    }
    public function find(int $id) {
        return $this->cache->remember('posts.'.$id, self::TTL, function () use ($id) {
            return $this->repo->find($id);
        });
    }
}
