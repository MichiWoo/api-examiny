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
            'usuario' => $this->user,
            'creado' => $this->creado,
            'actualizado' => $this->actualizado,
        ];
        return $data;
    }
}
