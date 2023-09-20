<?php

namespace App\Http\Controllers;

use App\Http\Resources\EvaluationResource;
use App\Models\Evaluation;
use App\Models\Group;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    use ApiResponder;

    public function index()
    {
        $userAuth = auth('sanctum')->user();
        $groups = Group::where('user_id', $userAuth['id'])->get();
        $evaluations = [];

        foreach ($groups as $group) {
            $students = $group->students;
            foreach ($students as $student) {
                $evaluations_of_students = $student->evaluations;
                foreach ($evaluations_of_students as $eval) {
                    array_push($evaluations, $eval);
                }
            }
        }

        $data = EvaluationResource::collection($evaluations);

        return $this->success('Información consultada correctamente', $data, 200);

    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'student_id' => 'required|integer|min:1',
                'test_id' => 'required|integer|min:1',
                'start' => 'required|date_format|min:1',
                'finish' => 'required|date_format|min:1',
                'qualification' => 'required|numeric|min:0',
                'answers_fine' => 'required|integer|min:1',
                'answers_bad' => 'required|integer|min:1',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages = [
                'required' => 'El campo :attribute es requerido.',
                'numeric' => 'El campo :attribute debe ser númerico.',
                'string' => 'El campo :attribute debe ser tipo texto.',
                'max' => 'El campo :attribute excede el tamaño requerido((:max).',
                'date_format' => 'El campo :attribute debe tener formato fecha (Y-m-d) ó formato fecha hora (YYYY-MM-DD HH:mm:ss)',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return $this->error("Error al crear el registro", $errors);
            }

            $eval = new Evaluation([
                'student_id' => $request->name,
                'test_id' => $request->test_id,
                'start' => $request->start,
                'finish' => $request->finish,
                'qualification' => $request->qualification,
                'answers_fine' => $request->answers_fine,
                'answers_bad' => $request->answers_bad,
            ]);
            $eval->save();

            $resource = new EvaluationResource($eval);

            return $this->success('Grupo registrado correctamente.', [
                'evaluacion' => $resource
            ]);
            
        } catch (\Throwable $th) {
            return $this->error("Error al registrar la evaluación, error:{$th->getMessage()}.");
        }
    }

    public function show($id_evaluation)
    {
        try {

            $eval = Evaluation::where('id', $id_evaluation)->first();

            if ($eval == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }
            
            $resource = new EvaluationResource($eval);
    
            return $this->success('Información consultada correctamente.', [
                'evaluacion' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al mostrar el registro, error:{$th->getMessage()}.");
        }
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
