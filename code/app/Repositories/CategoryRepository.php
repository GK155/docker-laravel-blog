<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function create(array $data)
    {
        $data['slug'] = Str::slug($data['title']);
        return Category::create($data);
    }

    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }

    public function delete($slug)
    {
        $category = $this->findBySlug($slug);

        return $category->delete();
    }

    public function posts($slug)
    {
        $category = $this->findBySlug($slug);
        return $category->posts()->get();
    }

    public function update(array $data)
    {
        $category = $this->findBySlug($data['slug']);

        $category->title = $data['title'];
        $category->slug =  Str::slug($data['title']);

        return $category->save();
    }

}
