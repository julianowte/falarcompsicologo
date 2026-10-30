<?php

namespace App\Support;

class Site
{
    /**
     * Link do WhatsApp com a mensagem inicial já preenchida.
     */
    public static function whatsappUrl(): string
    {
        return 'https://wa.me/'.config('site.whatsapp.numero').'?text='.rawurlencode(config('site.whatsapp.mensagem'));
    }

    /**
     * Cidade e estado para exibição, por exemplo "Uberlândia-MG".
     */
    public static function localidade(): string
    {
        return collect([config('site.cidade'), config('site.estado')])->filter()->implode('-');
    }

    /**
     * Dados estruturados (schema.org) compartilhados por todas as páginas.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function grafoBase(): array
    {
        $url = url('/');
        $psicologo = config('site.psicologo');

        $servico = [
            '@type' => 'ProfessionalService',
            '@id' => $url.'#consultorio',
            'name' => config('site.nome').' · Psicólogo '.$psicologo['nome'],
            'description' => config('site.descricao'),
            'url' => $url,
            'logo' => asset('android-icon-512x512.png'),
            'image' => asset('android-icon-512x512.png'),
            'priceRange' => 'Consulte pelo WhatsApp',
            'areaServed' => collect(config('site.paises'))->map(fn (array $pais) => ['@type' => 'Country', 'name' => $pais['nome']])->all(),
            'availableLanguage' => ['pt-PT', 'pt-BR'],
            'founder' => ['@id' => $url.'#psicologo'],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'agendamento',
                'url' => self::whatsappUrl(),
                'telephone' => '+'.config('site.whatsapp.numero'),
                'availableLanguage' => ['pt-PT', 'pt-BR'],
                'areaServed' => collect(config('site.paises'))->pluck('codigo')->all(),
            ],
            'knowsAbout' => $psicologo['areas'],
            'serviceType' => ['Psicoterapia', 'Terapia Cognitivo-Comportamental', 'Avaliação neuropsicológica', 'Intervenção no neurodesenvolvimento', 'Terapia online em português'],
        ];

        if (self::localidade() !== '') {
            $servico['address'] = [
                '@type' => 'PostalAddress',
                'addressLocality' => config('site.cidade'),
                'addressRegion' => config('site.estado'),
                'addressCountry' => 'BR',
            ];
        }

        return [
            [
                '@type' => 'WebSite',
                '@id' => $url.'#website',
                'url' => $url,
                'name' => config('site.nome'),
                'inLanguage' => 'pt',
                'publisher' => ['@id' => $url.'#consultorio'],
            ],
            $servico,
            [
                '@type' => 'Person',
                '@id' => $url.'#psicologo',
                'name' => $psicologo['nome_completo'],
                'alternateName' => $psicologo['nome_publico'],
                'jobTitle' => $psicologo['titulo'],
                'image' => asset('assets/fotos/erik-dos-santos-felizardo-800.jpg'),
                'url' => route('paginas.quem-e-erik-felizardo-psicologo-em-portugal-e-brasil'),
                'worksFor' => ['@id' => $url.'#consultorio'],
                'knowsAbout' => $psicologo['areas'],
                'knowsLanguage' => ['pt-PT', 'pt-BR'],
                'memberOf' => [
                    '@type' => 'Organization',
                    'name' => $psicologo['registro_entidade'],
                    'url' => $psicologo['registro_url'],
                ],
                'alumniOf' => collect($psicologo['formacao'])->map(fn (array $formacao) => [
                    '@type' => 'CollegeOrUniversity',
                    'name' => $formacao['instituicao'],
                    'address' => ['@type' => 'PostalAddress', 'addressCountry' => $formacao['pais']],
                ])->all(),
                'hasCredential' => [
                    [
                        '@type' => 'EducationalOccupationalCredential',
                        'credentialCategory' => 'Cédula profissional',
                        'name' => $psicologo['registro'],
                        'recognizedBy' => [
                            '@type' => 'Organization',
                            'name' => $psicologo['registro_entidade'],
                            'url' => $psicologo['registro_url'],
                        ],
                    ],
                    ...collect($psicologo['formacao'])->map(fn (array $formacao) => [
                        '@type' => 'EducationalOccupationalCredential',
                        'credentialCategory' => 'degree',
                        'name' => $formacao['curso'],
                        'recognizedBy' => ['@type' => 'CollegeOrUniversity', 'name' => $formacao['instituicao']],
                    ])->all(),
                ],
            ],
        ];
    }
}
