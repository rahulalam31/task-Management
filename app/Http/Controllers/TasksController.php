<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Notes;
use App\Models\Tasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TasksController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $query = Tasks::query();
        $filters = $request->input('filter', []);

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['due_date'])) {
            $query->where('due_date', $filters['due_date']);
        }

        if (isset($filters['priority'])) {
            $query->where('priority', $filters['priority']);
        }

        if (isset($filters['notes'])) {
            $query->whereHas('notes');
        }

        $query->orderBy('priority', 'desc')->withCount('notes')->orderByDesc('notes_count');

        $task = $query->get();
        return $this->sendResponse(TaskResource::collection($task), "All Task Fetched Succesfully.");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {

        $task = new Tasks;
        $task->subject = $request->input('subject');
        $task->description = $request->input('description');
        $task->start_date = $request->input('start_date');
        $task->due_date = $request->input('due_date');
        $task->status = $request->input('status');
        $task->priority = $request->input('priority');
        $task->save();

        $notes = $request->input('notes');

        foreach ($notes as $noteData) {
            $note = new Notes;
            $note->subject = $noteData['subject'];
            $note->note = $noteData['note'];
            $note->task_id = $task->id;
            // if ($noteData['attachment']) {
            //     $path = Storage::putFile('app/attachments', $noteData['attachment']);
            //     $note->attachment = $path;
            // }
            if (isset($noteData['attachment'])) {
                $path = $noteData['attachment']->store('app/attachments');
                $note->image = $path;
            }
            $note->image = "32154";

            $task->notes()->save($note);
        }

        return $this->sendResponse(new TaskResource($task), "Task Created Succesfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResponse
    {
        $tasks = Tasks::find($id);

        return $this->sendResponse(new TaskResource($tasks), "Task Fetched Succesfully.");
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
