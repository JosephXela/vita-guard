<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role === 'ADMIN'
            ? Response::allow()
            : Response::deny('Hanya Admin Yang Boleh Menambah Artikel');
    }

    public function store(User $user)
    {
        return $user->role === 'ADMIN'
            ? Response::allow()
            : Response::deny('Hanya Admin Yang Boleh Menambah Artikel');
    }
    public function update(User $user, Article $article): Response
    {
        //
        return $user->role === 'ADMIN'
            ? Response::allow()
            : Response::deny('Hanya Admin Yang Boleh Mengubah Artikel');
    }

    public function delete(User $user)
    {
        //
        return ($user->role == "ADMIN") ?
            Response::allow() :
            Response::deny("Hanya Admin Yang Dapat Menghapus Artikel");
    }
}
