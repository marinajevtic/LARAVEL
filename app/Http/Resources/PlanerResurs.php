<?php

namespace App\Http\Resources;

use App\Models\Destinacija;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanerResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $destinacija = Destinacija::find($this->destinacija_id);

        return [
            'id' => $this->id,
            'opis' => $this->opis,
            'doba' => $this->doba,
            'destinacija' => $destinacija->destinacija,
            'zemlja' => $destinacija->zemlja,
            'cena' => $this->cena
        ];
    }
}
