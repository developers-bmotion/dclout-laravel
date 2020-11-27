<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new \App\Company;
        $company->busines_name ='Company';
        $company->phone= '111122221';
        $company->address='calle falsa 123';
        $company->description = 'una descripcion de la empresa';
        $company->country_id = 1;

        $company->save();
    }
}
