<?php

namespace Modules\ValidationPayment\Services; 


use Modules\Portal\Rules\NotInCustomRule;
use Modules\Portal\Rules\NullRule;
use Modules\Portal\Services\Validation\Data\InfoValidationService;
use Modules\Portal\Services\Validation\Data\InfoValidationsService;


class InfoService extends InfoValidationService
{

	public function rule($data, $index, $columns){
		return  [
			'id' => ['integer', 'min:1', new NotInCustomRule($this->chunkColumn($columns, 'id', 0, $index-2), 'Duplicado')],
			'description' => ['filled', 'string', 'max:191', new NotInCustomRule($this->chunkColumn($columns, 'description', 0, $index-2), 'Duplicado')],
			'min_value' => 'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
			'discount' => 'numeric|between:0,100|regex:/^\d+(\.\d{1,2})?$/',
			'addition' => 'numeric|between:0,100|regex:/^\d+(\.\d{1,2})?$/',
			'visible' => 'integer|min:0|max:1'
		];
	}

	public function modifiers()
	{
		return [
			['rule' => ['min_value' => [new NullRule()]], 'filter' => 'setToZero'],
			['rule' => ['discount' => [new NullRule()]], 'filter' => 'setToZero'],
			['rule' => ['addition' => [new NullRule()]], 'filter' => 'setToZero'],
			['rule' => ['min_value' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
			['rule' => ['discount' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
			['rule' => ['addition' => ['required', 'regex:/^(R\$)?( )?([1-9]{1}[\d]{0,2}(\.[\d]{3})*(\,[\d]{0,2})?|[1-9]{1}[\d]{0,}(\,[\d]{0,2})?|0(\,[\d]{0,2})?|(\,[\d]{1,2})?)$/']], 'filter' => 'currencyFormat'],
		];
	}

	public function columnsFormat($header)
	{
		return [
			'description' => InfoValidationsService::STRING_FORMAT
		];
	}

}