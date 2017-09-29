<?php

declare(strict_types=1);

use Marcosh\SumType\Maybe;

describe("Match", function() {
    it("matches on just something", function() {
        $just42 = Maybe::just(42);

        expect(
            $just42->match(
                function ($value) {return $value;},
                function () {return 'nothing';}
            )
        )->toBe(42);
    });

    it("matches on nothing", function() {
        $nothing = Maybe::nothing();

        expect(
            $nothing->match(
                function ($value) {return $value;},
                function () {return 'nothing';}
            )
        )->toBe('nothing');
    });
});
