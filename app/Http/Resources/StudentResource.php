<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'nombre' => $this->name,
            'email' => $this->email,
            'usuario' => new UserResource($this->user),
            'creado' => date_format($this->created_at, 'Y-m-d H:m:s'),
            'actualizado' => date_format($this->updated_at, 'Y-m-d H:m:s')
        ];
        return $data;
    }
}
