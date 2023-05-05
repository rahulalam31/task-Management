<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'start_date' => $this->start_date, //->format('d/m/Y'),
            'due_date' => $this->due_date, //->format('d/m/Y'),
            'status' => $this->status,
            'priority' => $this->priority,
             'notes' => NoteResource::collection($this->id),
        ];
    }
}
