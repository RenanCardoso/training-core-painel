<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * @param Factory $factory
     */
    public function boot(Factory $factory)
    {
        $factory->extend('cpf', '\App\Validator\CPF@apply');
        $factory->extend('cnpj', '\App\Validator\CNPJ@apply');
        $factory->extend('cep', '\App\Validator\CEP@apply');
        $factory->extend('cnh', '\App\Validator\CNH@apply');

        $factory->extend('credit_card', '\App\Validator\CreditCard@apply');

        $factory->extend('phone', '\App\Validator\Phone@phone');
        $factory->extend('cell', '\App\Validator\Phone@cellWithout9');
        $factory->extend('phone_cell', '\App\Validator\Phone@phoneCell');

        $factory->extend('bigger', '\App\Validator\Value@bigger');
        $factory->extend('price', '\App\Validator\Price@apply');
        $factory->extend('percentage', '\App\Validator\Percentage@apply');

        $factory->extend('date_before_today', '\App\Validator\Date@beforeToday');
        $factory->extend('date_before_equals_today', '\App\Validator\Date@beforeEqualsToday');

        $factory->extend('password', '\App\Validator\Password@apply');

        $factory->extend('small_letter', '\App\Validator\SmallLetter@apply');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
