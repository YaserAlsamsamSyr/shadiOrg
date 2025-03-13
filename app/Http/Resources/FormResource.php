<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "firstName"=>$this->firstName,
            "lastName"=>$this->lastName,
            "fatherName"=>$this->fatherName,
            "motherName"=>$this->motherName,
            "iss"=>$this->iss,
            "birthDate"=>$this->birthDate,
            "birthDateArea"=>$this->birthDateArea,
            "joinType"=>$this->joinType,
            "status"=>$this->status,
        ];
    }
}
