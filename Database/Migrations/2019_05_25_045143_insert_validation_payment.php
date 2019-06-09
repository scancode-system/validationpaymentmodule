<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Portal\Entities\Validation;

class InsertValidationPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Validation::create([
                'alias' => 'pagamentos',
                'module_name' => 'ValidationPayment',
                'module_alias' => 'validationpayment',
                'video' => 'https://www.youtube.com/watch?v=sd5Rd4LRGgs&t=34s',
                'file' => 'pagamentos.xlsx',
                'validation' => 'payments', 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Validation::where('module_name', 'ValidationPayment')->first()->delete();
    }
}
