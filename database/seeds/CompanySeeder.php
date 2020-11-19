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
        $company->email = 'llorente@llorente.com';
        $company->credit_card='1111122223331';
        $company->logo='';
        $company->constitution_date=date('now');
        $company->compensation_box='compensationbox';
        $company->legal_representative='ejemplo representante';
        $company->substitute_legal_representative='ejemplo sustituto';
        $company->slug='llorente';
        $company->save();
    }
}
