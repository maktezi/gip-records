<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Beneficiary::factory(100)->create()
        ->each(function($beneficiary){
            Status::create(['office_id' => $beneficiary->id,]);
        });
    }
}
