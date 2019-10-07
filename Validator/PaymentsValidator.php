<?php

namespace Modules\ValidationPayment\Validator;

use Modules\Portal\Imports\ValidatorImport;
use Modules\Portal\Rules\NotInCustomRule;

class PaymentsValidator extends ValidatorImport
{

	protected $required = ['descricao'];

	public function rule($data){
		return  [
			'id_condicao_pagamento' => 	['integer', 'min:1',  new NotInCustomRule($this->chunkColumn('id_condicao_pagamento', 0, $this->row_index-2), 'Duplicado')],
			'descricao' => 				['filled', 'string', 'max:30', new NotInCustomRule($this->chunkColumn('descricao', 0, $this->row_index-2), 'Duplicado')],
			'descricao_longa' => 		'string|max:100',
			'desconto' => 				'integer|min:0|max:100',
			'valor_minimo' => 			'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
			'acrescimo' => 				'integer|min:0|max:100'
		];
	}


public function messages(){
		return  [];
	}
}
