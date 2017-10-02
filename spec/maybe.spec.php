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

describe("With default", function () {
    it("returns the value on just", function () {
        $just42 = Maybe::just(42);

        expect(
            $just42->withDefault('default')
        )->toBe(42);
    });

    it("returns the default value on nothing", function () {
        $nothing = Maybe::nothing();

        expect(
            $nothing->withDefault('default')
        )->toBe('default');
    });
});

describe("Map", function () {
    it("maps the value with the provided function", function () {
        $just42 = Maybe::just(42);

        expect(
            $just42->map(function ($x) {return $x + 1;})
        )->toEqual(Maybe::just(43));
    });

    it("maps nothing to nothing", function () {
        $nothing = Maybe::nothing();

        expect(
            $nothing->map(function ($x) {return $x + 1;})
        )->toEqual(Maybe::nothing());
    });
});
