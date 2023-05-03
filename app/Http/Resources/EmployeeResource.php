<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'employeeNumber' => $this->employeeNumber,
            'lastName' => $this->lastName,
            'firstName' => $this->firstName,
            'extension' => $this->extension,
            'email' => $this->email,
            'officeCode' => $this->officeCode,
            'jobTitle' => $this->jobTitle,
            'city' => optional($this->office)->city ?? 'N/A',
            'phone' => optional($this->office)->phone ?? 'N/A',
            'reportsTo' => optional($this->reporting)->employeeNumber ?? 'N/A',
            'reportToLastName' => optional($this->reporting)->lastName ?? 'N/A',
            'reportToFirstName' => optional($this->reporting)->firstName ?? 'N/A',
        ];
    }
}
