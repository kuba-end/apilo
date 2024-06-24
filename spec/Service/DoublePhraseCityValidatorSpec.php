<?php

namespace spec\App\Service;

use App\Service\DoublePhraseCityValidator;
use PhpSpec\ObjectBehavior;

class DoublePhraseCityValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DoublePhraseCityValidator::class);
    }

    function it_validates_a_double_word_city_name()
    {
        $this->validate('Siemianowice śląskie')->shouldReturn('Siemianowice Śląskie');
        $this->validate('new york')->shouldReturn('New York');
        $this->validate('FOo bAR')->shouldReturn('Foo Bar');
    }

    function it_returns_empty_string_for_single_word_city_names()
    {
        $this->validate('warszawa')->shouldReturn('');
        $this->validate('zabrze')->shouldReturn('');
    }

    function it_returns_empty_string_for_city_names_with_more_than_two_words()
    {
        $this->validate('now miasto nad pilicą')->shouldReturn('');
        $this->validate('kostrzyn nad odrą')->shouldReturn('');
    }

    function it_returns_empty_string_for_city_names_without_spaces()
    {
        $this->validate('bielsko-biała')->shouldReturn('');
    }
}
