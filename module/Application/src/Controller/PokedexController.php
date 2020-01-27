<?php

namespace Application\Controller;

use Exception;
use Application\Model\PokeAPI;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class PokedexController extends AbstractActionController {

    public function __construct() {
    }

    public function indexAction() {
        $api = new PokeAPI();
        $pokeNb = 151;
        $errorMsg;
        $search = $this->params()->fromQuery('search');

        if ( !empty($search) ) {
            $data = json_decode($api->pokemon(strtolower($search)));
            if ($data->code !== 404) {
                return new ViewModel([
                    'pokemon' => $data
                ]);
            } else {
                $errorMsg = "The pokemon you're looking for does not exist";
                $pokemons = json_decode($api->resourceList('pokemon', $pokeNb));
                if ($pokemons->code !== 404) {
                    return new ViewModel([
                        'pokemons' => $pokemons->results,
                        'errorMsg' => $errorMsg
                    ]);
                }
            }
        } else {
            $pokemons = json_decode($api->resourceList('pokemon', $pokeNb));
            if ($pokemons->code !== 404) {
                return new ViewModel([
                    'pokemons' => $pokemons->results
                ]);
            }
        }
        $errorMsg = "Could not load resources, please Try again.";
        return new ViewModel([
            'errorMsg' => $errorMsg
        ]);
    }

    public function detailAction() {
        $api = new PokeAPI();
        $errorMsg;
        $id = $this->params()->fromRoute('id');

        if ( $id <= 0 || $id > 151) {
            $errorMsg = "The pokemon's id does not exist";
            return new ViewModel([
                'errorMsg' => $errorMsg
            ]);
        } else {
            try {
                $pokemon = json_decode($api->pokemon($id));
                return new ViewModel([
                    'pokemon' => $pokemon
                ]);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}
