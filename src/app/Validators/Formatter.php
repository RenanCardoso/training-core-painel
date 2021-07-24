<?php

namespace App\Validators;

use Illuminate\Support\Carbon;

class Formatter
{
    /**
     * Retorno a string numérica formatada para valor com decimais com ponto para o banco de dados.
     * @param $value
     * @return mixed
     */
    public static function formatToDatabase($value)
    {
        $value = str_replace("R$ ", '', $value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", ".", $value);
        $value = str_replace("-", "", $value);
        return trim($value);
    }

    /**
     * Retorno a string numérica formatada para valor com decimais com virgula
     * @param $value
     * @param int $decimals
     * @return string
     */
    public static function format($value, $decimals = 2)
    {
        if (!empty($value)) {
            $value = number_format($value, $decimals, ',', '.');
            return $value;
        }
        return '0,00';
    }

    public static function formatterDate($value)
    {
        $value = Carbon::parse($value);
        return $value->format("d/m/Y");
    }

    public static function formatterCPF($cpf)
    {
        $cpfsplit = str_split($cpf, 3);
        if (strlen($cpf) == 11) {
            $cpf = $cpfsplit[0] . '.' . $cpfsplit[1] . '.' . $cpfsplit[2] . '-' . $cpfsplit[3];
        }
        return $cpf;
    }

    public static function formatterFone($fone)
    {
        if (!$fone) {
            return '';
        }

        if (strlen($fone) == 10) {
            return '(' . substr($fone, 0, 2) . ')' . substr($fone, 2, 4) . '-' . substr($fone, 6);
        }

        if (strlen($fone) == 11) {
            return '(' . substr($fone, 0, 2) . ')' . substr($fone, 2, 5) . '-' . substr($fone, 7);
        }

        return $fone;
    }

    public static function formatterCEP($cep){

        if (strlen($cep) == 0) {
            return $cep;
        }

        $cep = str_pad($cep, 8, "0", STR_PAD_LEFT);

        $p1 = substr($cep, 0, 2);
        $p2 = substr($cep, 2, 3);
        $p3 = substr($cep, 5, 3);
        $cep = "{$p1}.{$p2}-{$p3}";

        return $cep;
    }


    /**
     * Valida se o valor é numérico
     * @param $value
     * @return boolean
     */
    public static function valid($value): bool
    {
        $value = (string)$value;
        $role = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";

        if (preg_match($role, $value) || is_numeric($value)) {
            return true;
        }
        return false;
    }

    /**
     * Conversão de um valor para centavos
     * @param float $value
     * @return int
     */
    public static function toCents(float $value): int
    {
        $integer = (int)$value;
        $cents = (float)bcsub($value, $integer) * 100;
        return (int)bcadd(bcmul($integer, 100), $cents);
    }
}
