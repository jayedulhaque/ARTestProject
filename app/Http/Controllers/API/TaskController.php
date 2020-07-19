<?php

namespace App\Http\Controllers\API;


// use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Task;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Api\CreatePostRequest;
// use App\Http\Requests\Api\UpdatePostRequest;
use App\Repositories\TasksRepository;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    protected $repository;

    public function __construct(TasksRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
   {
       $tasks = $this->repository->get();
       return response()->json([
          'error' => false,
          'tasks'  => $tasks,
      ], 200);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         try {
             $task = $this->repository->store($request);
             return response()->json(['task' => $task]);
         } catch (Exception $e) {
             return response()->json(['message' => $e->getMessage()], $e->getStatus());
         }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
         try {
             $task = $this->repository->update($id, $request);
             return response()->json(['task' => $task]);
         } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
         }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         try {
             $task = $this->repository->show($id);
             return response()->json(['task' => $task]);
         } catch (Exception $e) {
             return response()->json(['message' => $e->getMessage()], $e->getStatus());
         }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         try {
             $this->repository->delete($id);
             return response()->json(['error' => false,
             'message'  => "Task record successfully deleted id # $id",], 204);
         } catch (Exception $e) {
             return response()->json(['message' => $e->getMessage()], $e->getStatus());
         }
     }
}
