<?php

namespace Modules\ValidationPayment\Services;


class ValidationPaymentService {
	
	public function fields(){
		return config('validationpayment.fields');
	}

	public function sample(){
		return config('validationpayment.sample');
	}

}
