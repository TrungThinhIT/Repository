<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function delete(int $id){
        $object = $this->model->find($id);
        $this->model->find($id)->delete();
        return response()->json([
            'message' => 'deleted success',
            'data' => $object
        ], 200);
    }
}
