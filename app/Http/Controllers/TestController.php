<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Models\Test;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuth = auth('sanctum')->user();
        $tests = Test::where('user_id', $userAuth['id'])->get();
        
        $data = TestResource::collection($tests);

        return $this->success('Información consultada correctamente', $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'duration' => 'required|integer|min:1',
                'user_id' => 'required|integer|min:1',
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

            $userAuth = auth('sanctum')->user();

            $test = new Test([
                'name' => $request->name,
                'image' => $request->image,
                'duration' => $request->duration,
                'user_id' => $userAuth['id']
            ]);
            $test->save();

            $resource = new TestResource($test);

            return $this->success('Test registrado correctamente.', [
                'test' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al registrar el test, error:{$th->getMessage()}.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_test)
    {
        try {

            $userAuth = auth('sanctum')->user();
            $test = Test::where('id', $id_test)->where('user_id', $userAuth['id'])->first();

            if ($test == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }
            
            $resource = new TestResource($test);
    
            return $this->success('Información consultada correctamente.', [
                'test' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al mostrar el registro, error:{$th->getMessage()}.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_test)
    {
        try {
            
            $rules = [
                'name' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'duration' => 'required|integer|min:1',
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
            
            $userAuth = auth('sanctum')->user();
            $test = Test::where('id', $id_test)->where('user_id', $userAuth['id'])->first();
            
            if ($test == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $test->name = $request->name;
            $test->image = $request->image;
            $test->duration = $request->duration;
            $test->save();

            $resource = new TestResource($test);
    
            return $this->success('Test actualizado correctamente.', [
                'test' => $resource
            ]);
        } catch (\Throwable $th) {
            return $this->error("Error al actualizar el registro, error:{$th->getMessage()}.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_test)
    {
        try {

            $userAuth = auth('sanctum')->user();
            $test = Test::where('id', $id_test)->where('user_id', $userAuth['id'])->first();
            
            if ($test == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $test->delete();

            $resource = new TestResource($test);
    
            return $this->success('Test eliminado correctamente.', [
                'test' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al eliminar el registro, error:{$th->getMessage()}.");
        }
    }
}
