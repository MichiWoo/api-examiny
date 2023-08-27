<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    use ApiResponder;

    public function index()
    {
        $students = Student::all();
        $students->load('answers');
        return response()->json($students);
    }

    
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:students',
                'user_id' => 'required|numeric',
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
                return $this->error("Error al actualizar el registro", $errors);
            }

            $student = new Student($request->all());
            $student->save();

            $resource = new StudentResource($student);

            return $this->success('Estudiante registrado correctamente.', [
                'estudiante' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al registrar el registro, error:{$th->getMessage()}.");
        }
    }

    public function show($id_student)
    {
        try {

            $student = Student::where('id', $id_student)->first();

            if ($student == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }
            
            $resource = new StudentResource($student);
    
            return $this->success('Estudiante actualizado correctamente.', [
                'estudiante' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al mostrar el registro, error:{$th->getMessage()}.");
        }
    }

    public function update(Request $request, $id_student)
    {
        try {
            
            $rules = [
                'name' => 'string|max:255',
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
                return $this->error("Error al actualizar el registro", $errors);
            }

            $student = Student::where('id', $id_student)->first();
            
            if ($student == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $student->name = $request->name;
            $student->save();

            $resource = new StudentResource($student);
    
            return $this->success('Estudiante actualizado correctamente.', [
                'estudiante' => $resource
            ]);
        } catch (\Throwable $th) {
            return $this->error("Error al actualizar el registro, error:{$th->getMessage()}.");
        }
    }

    public function destroy($id_student)
    {
        try {

            $student = Student::where('id', $id_student)->first();
            
            if ($student == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $student->delete();

            $resource = new StudentResource($student);
    
            return $this->success('Estudiante eliminado correctamente.', [
                'estudiante' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al eliminar el registro, error:{$th->getMessage()}.");
        }
    }
}
