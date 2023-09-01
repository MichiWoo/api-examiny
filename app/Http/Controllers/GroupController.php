<?php

namespace App\Http\Controllers;

use App\Http\Resources\GruopResource;
use App\Models\Group;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuth = auth('sanctum')->user();
        $groups = Group::where('user_id', $userAuth['id'])->get();
        
        $data = GruopResource::collection($groups);

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

            $group = new Group([
                'name' => $request->name,
                'user_id' => $userAuth['id']
            ]);
            $group->save();

            $resource = new GruopResource($group);

            return $this->success('Grupo registrado correctamente.', [
                'grupo' => $resource
            ]);
        } catch (\Throwable $th) {
            return $this->error("Error al registrar el grupo, error:{$th->getMessage()}.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_group)
    {
        try {

            $userAuth = auth('sanctum')->user();
            $group = Group::where('id', $id_group)->where('user_id', $userAuth['id'])->first();

            if ($group == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }
            
            $resource = new GruopResource($group);
    
            return $this->success('Información consultada correctamente.', [
                'grupos' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al mostrar el registro, error:{$th->getMessage()}.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_group)
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
            
            $userAuth = auth('sanctum')->user();
            $group = Group::where('id', $id_group)->where('user_id', $userAuth['id'])->first();
            
            if ($group == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $group->name = $request->name;
            $group->save();

            $resource = new GruopResource($group);
    
            return $this->success('Grupo actualizado correctamente.', [
                'grupo' => $resource
            ]);
        } catch (\Throwable $th) {
            return $this->error("Error al actualizar el registro, error:{$th->getMessage()}.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_group)
    {
        try {

            $userAuth = auth('sanctum')->user();
            $group = Group::where('id', $id_group)->where('user_id', $userAuth['id'])->first();
            
            if ($group == NULL)
            {
                return $this->error("Error, NO se encontró el registro.");
            }

            $group->delete();

            $resource = new GruopResource($group);
    
            return $this->success('Grupo eliminado correctamente.', [
                'grupo' => $resource
            ]);

        } catch (\Throwable $th) {
            return $this->error("Error al eliminar el registro, error:{$th->getMessage()}.");
        }
    }
}
