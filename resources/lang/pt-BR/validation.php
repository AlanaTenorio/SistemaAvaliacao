<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute deve ser aceito.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O :attribute deve ocnter apenas letras, números e underlines.',
    'alpha_num'            => 'O :attribute deve conter apenas letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma date anterior a :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve estar contido entre :min e :max.',
        'file'    => 'O :attribute deve estar contido entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve conter entre :min e :max caracteres.',
        'array'   => 'O :attribute deve conter entre :min e :max itens.',
    ],
    'boolean'              => 'O :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A senha e sua confirmação não são iguais',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não está no formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve conter :digits dígitos.',
    'digits_between'       => 'O :attribute deve conter entre :min e :max dígitos.',
    'dimensions'           => 'O :attribute possui dimensões inválidas de imagem.',
    'distinct'             => 'O :attribute tem um valor duplicado.',
    'email'                => 'O :attribute precisa ser um email válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O :attribute deve conter um valor.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço IP válido.',
    'ipv4'                 => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O :attribute deve ser uma JSON válido.',
    'max'                  => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file'    => 'O :attribute não deve ser maior que :max kilobytes.',
        'string'  => 'O :attribute não deve ser maior que :max caracteres.',
        'array'   => 'O :attribute não deve possuir mais que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ser maior ou igual a :min.',
        'file'    => 'O :attribute deve possuir ao menos :min kilobytes.',
        'string'  => 'O :attribute deve possuir ao menos :min caracteres.',
        'array'   => 'O :attribute deve possuir ao menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar preenchido.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está preenchido.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está preenchido.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está preenchido.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum destes :values estão preenchidos.',
    'same'                 => 'O :attribute e :other devem coincidir.',
    'size'                 => [
        'numeric' => 'O :attribute deve possuir tamanho igual a :size.',
        'file'    => 'O :attribute deve possuir tamanho igual a :size kilobytes.',
        'string'  => 'O :attribute deve conter :size caracteres.',
        'array'   => 'O :attribute deve conter :size itens.',
    ],
    'string'               => 'O :attribute deve ser uma palavra.',
    'timezone'             => 'O :attribute deve ser uma zona de tempo válida.',
    'unique'               => 'O :attribute já está em uso.',
    'uploaded'             => 'O :attribute falhou durante o envio.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
