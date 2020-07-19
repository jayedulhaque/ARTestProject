<?php
namespace App\Repositories;

use App\Task;
use App\Repositories\AppRepository;
use Illuminate\Http\Request;

class TasksRepository extends AppRepository
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    /**
     * set payload data for posts table.
     *
     * @param Request $request [description]
     * @return array of data for saving.
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
    }
}
