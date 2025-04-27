<?php

class Validacao
{
    public $validacoes;

    public static function validar($regras, $dados)
    {
        $validacao = new Validacao();
        foreach ($regras as $campo => $regrasDoCampo) {
            foreach ($regrasDoCampo as $regra) {
                $valorCampo = $dados[$campo];
                $validacao->$regra($campo, $valorCampo);
            }
        }

        return $validacao;
    }

    private function required($campo, $valor)
    {
        if (strlen($valor) == 0) {
            $this->validacoes[] = "{$campo} é obrigatório";
        }
    }

    private function email($campo, $valor)
    {
        if (! filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "{$campo} é invalido";
        }
    }

    private function senha($campo, $valor)
    {
        if (!strlen($valor) < 4 || strlen($valor) > 8) {
            $this->validacoes[] = "{$campo} deve conter entre 4 a 8 caracteres";
        }
    }

    /*
    if(strlen($senha) == 0) {
        $validacoes[] = "Senha é obrigatório";
    }

    if(strlen($senha) < 4 || strlen($senha) > 8) {
        $validacoes[] = "Senha deve ter entre 4 a 8 caracteres";
    }
    */

    public function naoPassou() {
        if(sizeof($this->validacoes) > 0) {
            return $_SESSION["validacoes"] = $this->validacoes;
        }
    }
}
