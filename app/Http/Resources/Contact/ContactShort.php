<?php

namespace App\Http\Resources\Contact;

use Illuminate\Http\Resources\Json\Resource;

class ContactShort extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'object' => 'contact',
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'is_partial' => (bool) $this->is_partial,
            'is_dead' => (bool) $this->is_dead,
            'deceased_date' => (is_null($this->deceased_date) ? null : $this->deceased_date->format(config('api.timestamp_format'))),
            'information' => [
                'dates' => [
                    [
                        'name' => 'birthdate',
                        'is_birthdate_approximate' => $this->is_birthdate_approximate,
                        'birthdate' => (is_null($this->birthdate) ? null : $this->birthdate->format(config('api.timestamp_format'))),
                    ],
                ],
            ],
            'account' => [
                'id' => $this->account->id,
            ],
        ];
    }
}
