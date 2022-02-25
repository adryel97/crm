<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;
use Sinesp\Sinesp;
use Sinesp\MandadoSinesp;

$veiculo = new Sinesp;
$mandado = new MandadoSinesp();

class Debugs
{
    public function debugs()
    {
        $veiculo = new Sinesp;

        try {

            // Pega pelo Get
            $placa = 'MEC-9495';

            if (!empty($placa)) {
                $veiculo->proxy('177.54.144.208', '80'); // Com proxy, esse metodo deve ser chamado antes do metodo buscar()
                $veiculo->buscar($placa);

                if ($veiculo->existe()) {
                    print_r($veiculo->dados());
                }
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
