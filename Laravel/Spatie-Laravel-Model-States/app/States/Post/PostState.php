<?php

namespace App\States\Post;

use Spatie\ModelStates\Exceptions\InvalidConfig;
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class PostState extends State
{
    abstract public function color(): string;

    /**
     * @return StateConfig
     * @throws InvalidConfig
     */
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Draft::class) // default saving state
            ->allowTransition(Draft::class, Pending::class) // allows transition from draft to pending
            ->allowTransition(Pending::class, Published::class) // allows transition from pending to published
            ->allowTransition(Published::class, Draft::class); // allows transition from published to draft
    }
}
