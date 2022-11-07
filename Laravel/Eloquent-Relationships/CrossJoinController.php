<?php

namespace App\Http\Controllers;

class CrossJoinController extends Controller
{
    public function index(): array
    {
        // In this step, we are creating 3 brands of the Ford car.
        $collection = collect(['Mustang', 'Focus', 'Fusion']);

        /*
         * We create both automatic and manual cars for every brand and also in different colors for each
         *
         * ["Mustang", "automatic", "black"]
         * ["Mustang", "automatic", "white"]
         * ["Mustang", "automatic", "blue"]
         * ["Mustang", "manual", "black"]
         *  ...
         */
        return $collection->crossJoin(['automatic', 'manual'], ['black', 'white', 'blue'])->toArray();
    }
}
