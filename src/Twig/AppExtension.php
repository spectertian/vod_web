<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('em_replace', [$this, 'doSomething'], ['pre_escape' => 'html', 'is_safe' => ['html']])
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('em_replace', [$this, 'doSomething']),
        ];
    }

    public function doSomething(string $source, string $replace_string): string
    {
        if ($replace_string == '') return $source;

        if ($source == "") return $source;

        return str_replace($replace_string, "<em>" . $replace_string . "</em>", $source);
    }

}
