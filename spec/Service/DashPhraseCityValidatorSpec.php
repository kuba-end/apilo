<?php

namespace spec\App\Service;

use App\Service\DashPhraseCityValidator;
use PhpSpec\ObjectBehavior;

class DashPhraseCityValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DashPhraseCityValidator::class);
    }

    function it_validates_a_dash_phrase_city_name()
    {
        $this->validate('bielsko-biała')->shouldReturn('Bielsko-Biała');
        $this->validate('JASTRZęBIE-zDrój')->shouldReturn('Jastrzębie-Zdrój');
    }

    function it_returns_empty_string_for_single_word_city_names()
    {
        $this->validate('warszawa')->shouldReturn('');
        $this->validate('zabrze')->shouldReturn('');
    }

    function it_returns_empty_string_for_city_names_with_spaces()
    {
        $this->validate('san francisco')->shouldReturn('');
        $this->validate('new york')->shouldReturn('');
    }

    function it_handles_names_with_multiple_dashes()
    {
        $this->validate('some-city-name')->shouldReturn('Some-City-Name');
        $this->validate('a-b-c-d')->shouldReturn('A-B-C-D');
    }

    function it_handles_names_without_dashes()
    {
        $this->validate('bielsko biała')->shouldReturn('');
    }
}
