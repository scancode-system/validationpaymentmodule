<?php

namespace Modules\ValidationPayment\Validator;

use Modules\Portal\Imports\ValidatorImport;

class PaymentsValidator extends ValidatorImport
{

	public function rule($data){
		return  [
			'id_condicao_pagamento' => 	'integer|min:1|unique_custom_values',
			'descricao' => 				'required|string|max:30',
			'descricao_longa' => 		'string|max:100',
			'desconto' => 				'integer|min:0|max:100',
			'valor_minimo' => 			'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
			'acrescimo' => 				'integer|min:0|max:100'
		];
	}

}
