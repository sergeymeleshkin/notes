<?php

namespace App\Repositories\GroupUsers;
use Illuminate\Cache\CacheManager;
class GroupUsersCacheRepository implements GroupUsersRepositoryInterface
{
    protected GroupUsersRepository $repo;
    protected CacheManager $cache;
    const TTL = 60;
    public function __construct(CacheManager $cache, GroupUsersRepository $repo) {
        $this->repo = $repo;
        $this->cache = $cache;
    }
    public function get() {
        return $this->cache->remember('group_users', self::TTL, function () {
            return $this->repo->get();
        });
    }
    public function show(int $id) {
        return $this->cache->remember('group_users.'.$id, self::TTL, function () use ($id) {
            return $this->repo->show($id);
        });
    }
}
