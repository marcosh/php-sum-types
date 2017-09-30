<?php

declare(strict_types=1);

use Marcosh\SumType\Maybe;

describe("Match", function () {
    it("matches on just something", function () {
        $just42 = Maybe::just(42);

        expect(
            $just42->match(
                function ($value) {return $value;},
                function () {return 'nothing';}
            )
        )->toBe(42);
    });

    it("matches on nothing", function () {
        $nothing = Maybe::nothing();

        expect(
            $nothing->match(
                function ($value) {return $value;},
                function () {return 'nothing';}
            )
        )->toBe('nothing');
    });
});

describe("Is just", function () {
    it("evaluates true on Just", function () {
        $just42 = Maybe::just(42);

        expect(
            $just42->isJust()
        )->toBe(true);
    });

    it("evaluates false on Nothing", function () {
        $just42 = Maybe::nothing();

        expect(
            $just42->isJust()
        )->toBe(false);
    });
});

describe("Is nothing", function () {
    it("evaluates false on Just", function () {
        $just42 = Maybe::just(42);

        expect(
            $just42->isNothing()
        )->toBe(false);
    });

    it("evaluates true on Nothing", function () {
        $just42 = Maybe::nothing();

        expect(
            $just42->isNothing()
        )->toBe(true);
    });
});
