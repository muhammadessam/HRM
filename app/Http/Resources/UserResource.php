<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                =>  $this->id,
            'name'              =>  $this->name,
            'email'             =>  $this->email,
            'matriculate'       =>  $this->matriculate,
            'sex'               =>  $this->sex,
            'salary'            =>  $this->salary,
            'hire_date'         =>  $this->hire_date,
            'phone'             =>  $this->phone,
            'address'           =>  $this->address,
            'situation'         =>  $this->situation,
            'nationality'       =>  $this->nationality,
            'hire_end'          =>  $this->hire_end,
            'end_reason'        =>  $this->end_reason,
            'degree_id'         =>  $this->degree_id,
            'department_id'     =>  $this->department_id,
            'specialty_id'      =>  $this->specialty_id,
            'lat'               =>  $this->lat,
            'lng'               =>  $this->lng,
            'degree'            =>  $this->degree,
            'department'        =>  $this->department,
            'specialty'         =>  $this->specialty,
            'courses'           =>  $this->courses,
            'experiences'       =>  $this->experiences,
            'pointings'         =>  $this->pointings,
            'usedVacations'     =>  $this->usedVacations,
            'deservedVacations' =>  $this->deservedVacations,
            'workingPeriods'    =>  $this->workingPeriods,
            'aids'              =>  $this->aids,
            'restDays'          =>  $this->restDays,
            'attachments'       =>  $this->attachments,
            'departments'       =>  $this->departments,
            'leavingComing'     =>  $this->leavingComing,
            'vacationRequests'  =>  $this->vacationRequests,
        ];
    }
}
