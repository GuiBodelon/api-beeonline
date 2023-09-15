<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Clients;
use App\Http\Resources\Clients as ClientsResource;

class ClientsController extends BaseController
{

    public function index()
    {
        $clients = Clients::all();
        return $this->sendResponse(ClientsResource::collection($clients), 'Clientes buscados.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'razao_social' => 'required',
            'cnpj' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'pais' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'natureza_juridica' => 'required',
            'email' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $clients = Clients::create($input);
        return $this->sendResponse(new ClientsResource($clients), 'Cliente criado.');
    }

    public function show($id)
    {
        $clients = Clients::find($id);
        if (is_null($clients)) {
            return $this->sendError('Cliente não existe.');
        }
        return $this->sendResponse(new ClientsResource($clients), 'Cliente buscado.');
    }

    public function update(Request $request, Clients $clients)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'razaoSocial' => 'required',
            'cnpj' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'pais' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'naturezaJuridica' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $clients->razao_social = $input['razaoSocial'];
        $clients->cnpj = $input['cnpj'];
        $clients->rua = $input['rua'];
        $clients->numero = $input['numero'];
        $clients->complemento = $input['complemento'];
        $clients->pais = $input['pais'];
        $clients->cidade = $input['cidade'];
        $clients->estado = $input['estado'];
        $clients->cep = $input['cep'];
        $clients->natureza_juridica = $input['naturezaJuridica'];
        $clients->email = $input['email'];
        $clients->status = $input['status'];
        $clients->save();

        return $this->sendResponse(new ClientsResource($clients), 'Cliente atualizado.');
    }

    public function destroy(Clients $clients)
    {
        $clients->delete();
        return $this->sendResponse([], 'Cliente excluído.');
    }
}
