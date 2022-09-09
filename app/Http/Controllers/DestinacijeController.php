<?php

namespace App\Http\Controllers;

use App\Http\Resources\DestinacijaResurs;
use App\Models\Destinacija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinacijeController extends HandleRequestsController
{
    public function index()
    {
        $destinacije = Destinacija::all();
        return $this->success(DestinacijaResurs::collection($destinacije), 'Vraceni svi podaci o destinacije!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'destinacija' => 'required',
            'zemlja' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $destinacija = Destinacija::create($input);

        return $this->success(new DestinacijaResurs($destinacija), 'Nova destinacija je napravljena.');
    }


    public function show($id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->error('Destinacija sa zadatim id-em ne postoji.');
        }
        return $this->success(new DestinacijaResurs($destinacija), 'Destinacija sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->error('Destinacija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'destinacija' => 'required',
            'zemlja' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $destinacija->destinacija = $input['destinacija'];
        $destinacija->zemlja = $input['zemlja'];
        $destinacija->save();

        return $this->success(new DestinacijaResurs($destinacija), 'Destinacija je izmenjena.');
    }

    public function destroy($id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->error('Destinacija sa zadatim id-em ne postoji.');
        }

        $destinacija->delete();
        return $this->success([], 'Destinacija je obrisana.');
    }
}
