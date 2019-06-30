<?php

namespace Modules\ValidationPayment\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider {

    public function boot() {
        View::composer('validationpayment::documentation', 'Modules\Portal\Http\ViewComposers\Parameters\CompanyValidationComposer');
    }

    public function register() {}

}
