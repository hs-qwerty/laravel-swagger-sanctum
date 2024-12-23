<?php

namespace App\Repositories\Blog;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    private Blog $model;
    public function __construct(Blog $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->with('blogCategory')->get();
    }
    public function findById(int $id)
    {
        return $this->model->find($id);
    }
    public function create($data)
    {
        return $this->model->create($data);
    }
    public function update($id, $data)
    {
        $model = $this->findById($id);
        return $model->update($data);
    }
    public function delete($id)
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}
