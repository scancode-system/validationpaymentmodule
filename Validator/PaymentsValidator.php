<?php

namespace Modules\ValidationPayment\Validator;

use Modules\Portal\Imports\ValidatorImport;
use Modules\Portal\Rules\NotInCustomRule;

class PaymentsValidator extends ValidatorImport
{

	protected $required = ['id', 'description', 'min_value', 'discount', 'addition'];

	public function rule($data){
		return  [
			'id' => ['integer', 'min:1', new NotInCustomRule($this->chunkColumn('id_cliente', 0, $this->row_index-2), 'Duplicado')],
			'description' => ['filled', 'string', 'max:255', new NotInCustomRule($this->chunkColumn('description', 0, $this->row_index-2), 'Duplicado')],
			'min_value' => 'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
			'discount' => 'numeric|between:0,100|regex:/^\d+(\.\d{1,2})?$/',
			'addition' => 'numeric|between:0,100|regex:/^\d+(\.\d{1,2})?$/',
		];
	}

	public function filterRules(){
		return [
			['rule' => ['min_value' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
			['rule' => ['discount' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
			['rule' => ['addition' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
		];
	}

	/*protected $required = ['descricao'];

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


	public function filterRules(){
		return [
			['rule' => ['valor_minimo' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
		];
	}

	public function messages(){
		return  [];
	}*/
}
