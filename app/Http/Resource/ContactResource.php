<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Code' => $this->Code,
            'Email' => $this->Email,
            'Name' => $this->Name,
            'Phone' => $this->Phone,
            'Mobile' => $this->Mobile,
            'Street' => $this->Street,
            'City' => $this->City,
            'State' => $this->State,
            'Zip' => $this->Zip,
            'Country' => $this->Countr,
            'VAT' => $this->VAT,
        ];
    }
}