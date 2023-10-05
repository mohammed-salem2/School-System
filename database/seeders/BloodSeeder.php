<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bloods')->delete();

        $bloods = ['O-' , 'O+' , 'A+' , 'A-' , 'B+' , 'B-' , 'AB+' , 'AB-'];

        foreach($bloods as $blood){
            Blood::create([
                'name' => $blood ,
                'slug' => Str::slug($blood),
                'admin_data'=> auth()->user(),
            ]);
        }
    }
}
