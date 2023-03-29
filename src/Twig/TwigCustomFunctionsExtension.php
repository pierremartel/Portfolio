<?php

namespace App\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TwigCustomFunctionsExtension extends AbstractExtension
{
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;


    public function __construct(TranslatorInterface $translator, UrlGeneratorInterface $urlGenerator)
    {
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'readInThisLanguageButton',
                [
                    $this,
                    'displayReadInThisLanguageButton'
                ],
                [
                    'is_safe' => [
                        'html'
                    ]
                ]
            ),
        ];
    }
    // nav.language
    public function displayReadInThisLanguageButton(string $locale): string 
    {
        if($locale === 'fr'){
            $readInEnglishLabel = $this->translator->trans(
                '',
                [],
                'nav_content'
            );

            return "<a href=\"{$this->getUpdateLocaleUrl($locale)}\" ><img src=\"../../img/en.png\" alt=\"en\" class=\"w-8 h-8\">{$readInEnglishLabel}</a>";
        }elseif($locale === 'en') {
            $readInFrenchLabel = $this->translator->trans(
                '',
                [],
                'nav_content'
            );

            return "<a href=\"{$this->getUpdateLocaleUrl($locale)}\" ><img src=\"../../img/fr.png\" alt=\"fr\" class=\"w-8 h-8\">{$readInFrenchLabel}</a>";

        }
    }

    public function getUpdateLocaleUrl(string $locale): string 
    {
        $locale = $locale === 'fr' ? 'en' : 'fr';

        return $this->urlGenerator->generate(
            'app_locale_update',
            [
                'locale' => $locale,
            ]
            );
    }
    
}