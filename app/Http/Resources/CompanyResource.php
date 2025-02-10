<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'date_creation' => $this->date_creation,
            'professor' => $this->professor ? [
                'id' => $this->professor->id,
                'name' => $this->professor->name,
            ] : null,
        ];
    }
}
