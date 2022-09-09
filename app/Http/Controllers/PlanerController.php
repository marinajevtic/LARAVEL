<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanerResurs;
use App\Models\Planer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanerController extends HandleRequestsController
{
    public function index()
    {
        $planovi = Planer::all();
        return $this->success(PlanerResurs::collection($planovi), 'Vraceni svi podaci o planovima putovanja!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'opis' => 'required',
            'doba' => 'required',
            'cena' => 'required',
            'destinacija_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $plan = Planer::create($input);

        return $this->success(new PlanerResurs($plan), 'Novi plan putovanja je kreiran.');
    }


    public function show($id)
    {
        $plan = Planer::find($id);
        if (is_null($plan)) {
            return $this->error('Plan putovanja sa zadatim id-em ne postoji.');
        }
        return $this->success(new PlanerResurs($plan), 'Plan putovanja sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $plan = Planer::find($id);
        if (is_null($plan)) {
            return $this->error('Plan putovanja sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'opis' => 'required',
            'doba' => 'required',
            'cena' => 'required',
            'destinacija_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $plan->opis = $input['opis'];
        $plan->doba = $input['doba'];
        $plan->cena = $input['cena'];
        $plan->destinacija_id = $input['destinacija_id'];
        $plan->save();

        return $this->success(new PlanerResurs($plan), 'Plan destinacije je izmenjen.');
    }

    public function destroy($id)
    {
        $plan = Planer::find($id);
        if (is_null($plan)) {
            return $this->error('Plan putovanja sa zadatim id-em ne postoji.');
        }

        $plan->delete();
        return $this->success([], 'Plan putovanja je obrisan.');
    }
}
