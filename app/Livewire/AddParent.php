<?php

namespace App\Livewire;

use App\Models\Blood;
use App\Models\nationality;
use App\Models\Religion;
use Livewire\Component;

class AddParent extends Component
{
    public $currentStep = 1,

        // Father_INPUTS
        $email, $password,
        $name_father, $name_father_en,
        $national_id_father, $passport_id_father,
        $phone_father, $job_father, $job_father_en,
        $nationality_father_id, $blood_father_id,
        $address_father, $religion_father_id;

        // Mother_INPUTS
        // $Name_Mother, $Name_Mother_en,
        // $National_ID_Mother, $Passport_ID_Mother,
        // $Phone_Mother, $Job_Mother, $Job_Mother_en,
        // $Nationality_Mother_id, $Blood_Type_Mother_id,
        // $Address_Mother, $Religion_Mother_id;


         //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => nationality::all(),
            'bloods' => Blood::all(),
            'religions' => Religion::all(),
        ]);
    }

}
