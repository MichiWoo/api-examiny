<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
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
            'estudiante' => new StudentResource($this->student),
            'test' => new TestResource($this->test),
            'inicio' => $this->start,
            'termino' => $this->finish,
            'calificación' => $this->qualification,
            'buenas' => $this->answers_fine,
            'malas' => $this->answers_bad,
            'creado' => date_format($this->created_at, 'Y-m-d H:m:s'),
            'actualizado' => date_format($this->updated_at, 'Y-m-d H:m:s')
        ];
        return $data;
    }
}
