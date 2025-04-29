<?php

class Validacao
{
    public $validacoes = [];

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
        if (strlen($valor) < 4) {
            $this->validacoes[] = "{$campo} deve ter no minimo 4 caracteres";
        }
    }

    private function unique($campo, $valor) {
        $database = new Database(config("database"));

        $resultado = $database->query(
            query: "select * from usuarios where email = :email",
            params: [
                "email" => $valor
            ]
        )->fetch();

        if($resultado) {
            $this->validacoes[] = "{$campo} já está sendo usado";
        }
    }
    
    public function naoPassou($nomeCustomizado = null) {
        $valor = "validacoes";

        if($nomeCustomizado) {
            $valor .= "_" . $nomeCustomizado;
        }

        flash()->push($valor, $this->validacoes);
        return sizeof($this->validacoes) > 0;
    }
}
