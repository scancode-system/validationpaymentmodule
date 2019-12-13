<?php

return [
	'name' => 'ValidationPayment', 
	'fields' => ['id', 'description', 'min_value', 'discount', 'addition'],
	'sample' => [
		[
			'name' => 'id',
			'observation' => 'Código do pagamento.',
			'sample_1' => '1',
			'filled' => false
		], 
		[
			'name' => 'description',
			'observation' => 'Descrição do pagamento.',
			'sample_1' => 'dinheiro',
			'filled' => true
		], 
		[
			'name' => 'min_value',
			'observation' => 'Valor minimo para finalizar o pedido.',
			'sample_1' => '1200',
			'filled' => false
		], 
		[
			'name' => 'discount',
			'observation' => 'Desconto em porcentagem.',
			'sample_1' => '10',
			'filled' => false
		], 
		[
			'name' => 'addition',
			'observation' => 'Aacréscimo em porcentagem.',
			'sample_1' => '5',
			'filled' => false
		]
	]
];
