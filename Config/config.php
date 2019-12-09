<?php

return [
    'name' => 'ValidationPayment', 
    'fields' => ['id', 'description', 'min_value', 'discount', 'addition'],
	'sample' => [
		[
			'name' => 'id',
			'observation' => 'Código do pagamento.',
			'filled' => false
		], 
		[
			'name' => 'description',
			'observation' => 'Descrição do pagamento.',
			'filled' => true
		], 
		[
			'name' => 'min_value',
			'observation' => 'Valor minimo para finalizar o pedido.',
			'filled' => false
		], 
		[
			'name' => 'discount',
			'observation' => 'Desconto em porcentagem.',
			'filled' => false
		], 
		[
			'name' => 'addition',
			'observation' => 'Aacréscimo em porcentagem.',
			'filled' => false
		]
	]
];
