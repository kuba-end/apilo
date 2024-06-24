<?php

namespace spec\App\Service;

use App\Service\TriplePhraseCityValidator;
use PhpSpec\ObjectBehavior;

class TriplePhraseCityValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TriplePhraseCityValidator::class);
    }

    function it_validates_a_triple_phrase_city_name()
    {
        $this->validate('kosTRzyn nad odrą')->shouldReturn('Kostrzyn nad Odrą');
        $this->validate('nowe miaSto nad pILICą')->shouldReturn('Nowe Miasto nad Pilicą');
    }

    function it_returns_empty_string_for_single_word_city_names()
    {
        $this->validate('warszawa')->shouldReturn('');
        $this->validate('Zabrze')->shouldReturn('');
    }

    function it_returns_empty_string_for_double_word_city_names()
    {
        $this->validate('new york')->shouldReturn('');
        $this->validate('kozy kozy')->shouldReturn('');
    }

    function it_validates_city_names_with_more_than_three_words()
    {
        $this->validate('some other city name')->shouldReturn('Some Other City Name');
    }

    function it_handles_prepositions_correctly()
    {
        $this->validate('nowe MIASTO Nad pilicą')->shouldReturn('Nowe Miasto nad Pilicą');
        $this->validate('kostrzyn Nad odrą')->shouldReturn('Kostrzyn nad Odrą');
    }
}
