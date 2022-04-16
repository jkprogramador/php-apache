<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];

    public function getNews($slug = '')
    {
        if (empty($slug)) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
