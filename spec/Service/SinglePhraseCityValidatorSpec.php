<?php

namespace spec\App\Service;

use App\Service\SinglePhraseCityValidator;
use PhpSpec\ObjectBehavior;

class SinglePhraseCityValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SinglePhraseCityValidator::class);
    }

    function it_validates_a_single_word_city_name()
    {
        $this->validate('zabrze')->shouldReturn('Zabrze');
        $this->validate('warszawa')->shouldReturn('Warszawa');
        $this->validate('kraków')->shouldReturn('Kraków');
        $this->validate('krAKów')->shouldReturn('Kraków');
        $this->validate('KrakóW')->shouldReturn('Kraków');
    }

    function it_returns_empty_string_for_city_names_with_spaces()
    {
        $this->validate('new york')->shouldReturn('');
        $this->validate('Siemianowice Śląskie')->shouldReturn('');
    }

    function it_returns_empty_string_for_city_names_with_dashes()
    {
        $this->validate('bielsko-biała')->shouldReturn('');
        $this->validate('Jastrzębie-zdrój')->shouldReturn('');
    }
}
