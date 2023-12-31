<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
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
            'description' => $this->description,
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status] ?? 'Status Not Found',
            'user' => new UserResource($this->user),
            'lesson' => new LessonResource($this->lesson),
            'replies' => LessonResource::collection($this->whenLoaded('replies')),
            'dt_updated' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
