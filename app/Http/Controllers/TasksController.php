<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Notes;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $task = Tasks::latest();
        return $this->sendResponse(TaskResource::collection($task), "All Task Fetched Succesfully.");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Tasks::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);
        if(!empty($request->notes)){
            $file = [];
            foreach($request->notes as $note){
                Notes::create([]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
