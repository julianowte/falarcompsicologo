<?php

/*
|--------------------------------------------------------------------------
| Páginas de conteúdo
|--------------------------------------------------------------------------
|
| Cada entrada vira uma rota (/{slug}), um item de menu, uma entrada do
| sitemap e do llms.txt. O texto da página fica em
| resources/views/paginas/{slug}.blade.php.
|
| grupo:       'erik' (menu principal) ou 'psicologia' (submenu)
| menu:        rótulo curto no menu
| titulo:      início do <title> (o layout acrescenta " | Erik Felizardo" quando o nome ainda não está no título)
| h1:          título visível da página
| descricao:   meta description (até ~155 caracteres)
| resumo:      parágrafo de abertura, abaixo do h1
| tipo:        tipo schema.org da página
| assunto:     condição ou terapia de que a página trata (schema.org about)
| relacionados: slugs sugeridos em "Leia também"
|
*/

return [

    'quem-e-erik-felizardo-psicologo-em-portugal-e-brasil' => [
        'grupo' => 'erik',
        'menu' => 'Quem é Erik',
        'icone' => 'terapia-individual',
        'titulo' => 'Quem é Erik Felizardo? Psicólogo e neuropsicólogo',
        'h1' => 'Quem é Erik Felizardo?',
        'descricao' => 'Conheça Erik Felizardo, psicólogo e neuropsicólogo, membro efetivo da Ordem dos Psicólogos Portugueses (OPP nº 32819), com mestrado em Neuropsicologia.',
        'resumo' => 'Psicólogo | Neuropsicólogo | Membro Efetivo da Ordem dos Psicólogos Portugueses (OPP)',
        'tipo' => 'ProfilePage',
        'relacionados' => ['atendimento-psicologico', 'terapia-cognitivo-comportamental-tcc', 'o-que-e-neuropsicologia'],
    ],

    'atendimento-psicologico' => [
        'grupo' => 'erik',
        'menu' => 'Sobre o meu atendimento',
        'icone' => 'atendimento-online',
        'titulo' => 'Atendimento psicológico online, em consultório e ao domicílio',
        'h1' => 'Sobre o meu atendimento',
        'descricao' => 'Acompanhamento psicológico com Terapia Cognitivo-Comportamental, intervenção no neurodesenvolvimento e avaliação neuropsicológica. Online, em consultório, ao domicílio e na escola.',
        'resumo' => 'Cada acompanhamento é individualizado: respeita a história, as características e o contexto de cada pessoa, com estratégias orientadas pela ciência.',
        'tipo' => 'WebPage',
        'relacionados' => ['terapia-cognitivo-comportamental-tcc', 'o-que-e-aba', 'o-que-e-neuropsicologia'],
    ],

    'o-que-e-psicologia' => [
        'grupo' => 'psicologia',
        'menu' => 'O que é Psicologia?',
        'icone' => 'mente',
        'titulo' => 'O que é Psicologia? Para que serve e quando procurar',
        'h1' => 'O que é Psicologia?',
        'descricao' => 'O que é a Psicologia, o que faz um psicólogo, a diferença entre psicólogo e psiquiatra e quando vale a pena procurar acompanhamento psicológico.',
        'resumo' => 'A Psicologia é a ciência que estuda o comportamento e os processos mentais: como pensamos, sentimos, aprendemos e nos relacionamos.',
        'tipo' => 'MedicalWebPage',
        'relacionados' => ['terapia-cognitivo-comportamental-tcc', 'o-que-e-neuropsicologia', 'atendimento-psicologico'],
    ],

    'terapia-cognitivo-comportamental-tcc' => [
        'grupo' => 'psicologia',
        'menu' => 'Abordagem TCC',
        'icone' => 'autoconhecimento',
        'titulo' => 'Terapia Cognitivo-Comportamental (TCC): o que é e como funciona',
        'h1' => 'Terapia Cognitivo-Comportamental (TCC)',
        'descricao' => 'O que é a Terapia Cognitivo-Comportamental (TCC), como funcionam as sessões, que técnicas usa e para que dificuldades tem evidência científica.',
        'resumo' => 'Uma das abordagens psicológicas com maior volume de investigação científica: estruturada, colaborativa e orientada para objetivos.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalTherapy', 'name' => 'Terapia Cognitivo-Comportamental', 'alternateName' => ['TCC', 'Cognitive Behavioral Therapy', 'CBT']],
        'relacionados' => ['ansiedade', 'depressao', 'atendimento-psicologico'],
    ],

    'o-que-e-aba' => [
        'grupo' => 'psicologia',
        'menu' => 'O que é ABA?',
        'icone' => 'equilibrio',
        'titulo' => 'O que é ABA (Análise do Comportamento Aplicada)?',
        'h1' => 'O que é ABA (Análise do Comportamento Aplicada)?',
        'descricao' => 'O que é a ABA, como funciona a intervenção baseada na Análise do Comportamento Aplicada no autismo e na PHDA e que competências pode desenvolver.',
        'resumo' => 'A Análise do Comportamento Aplicada usa princípios científicos da aprendizagem para desenvolver competências que favorecem a autonomia e a qualidade de vida.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalTherapy', 'name' => 'Análise do Comportamento Aplicada', 'alternateName' => ['ABA', 'Applied Behavior Analysis']],
        'relacionados' => ['o-que-e-autismo-segundo-o-dsm', 'tdah-phda', 'neurodivergencia'],
    ],

    'o-que-e-autismo-segundo-o-dsm' => [
        'grupo' => 'psicologia',
        'menu' => 'O que é Autismo segundo o DSM?',
        'icone' => 'criancas-adolescentes',
        'titulo' => 'O que é o autismo segundo o DSM-5-TR? Critérios e níveis de suporte',
        'h1' => 'O que é o autismo segundo o DSM?',
        'descricao' => 'Como o DSM-5-TR define a Perturbação do Espetro do Autismo (TEA): critérios de diagnóstico, níveis de suporte, especificadores e como é feita a avaliação.',
        'resumo' => 'No DSM-5-TR, o autismo é descrito como Perturbação do Espetro do Autismo (no Brasil, Transtorno do Espectro Autista, TEA): uma condição do neurodesenvolvimento que se manifesta de formas muito diferentes de pessoa para pessoa.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalCondition', 'name' => 'Perturbação do Espetro do Autismo', 'alternateName' => ['Transtorno do Espectro Autista', 'TEA', 'PEA', 'Autismo']],
        'relacionados' => ['o-que-e-o-dsm', 'o-que-e-aba', 'neurodivergencia'],
    ],

    'tdah-phda' => [
        'grupo' => 'psicologia',
        'menu' => 'TDAH/PHDA',
        'icone' => 'estresse',
        'titulo' => 'TDAH / PHDA: sintomas, diagnóstico e acompanhamento',
        'h1' => 'TDAH / PHDA: Perturbação de Hiperatividade e Défice de Atenção',
        'descricao' => 'O que é a PHDA (TDAH no Brasil): sintomas de desatenção e hiperatividade-impulsividade, critérios do DSM-5-TR, PHDA em adultos e como é o acompanhamento.',
        'resumo' => 'A PHDA (Perturbação de Hiperatividade e Défice de Atenção), chamada TDAH no Brasil, é uma condição do neurodesenvolvimento que afeta a atenção, a atividade e o controlo dos impulsos, em crianças e em adultos.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalCondition', 'name' => 'Perturbação de Hiperatividade e Défice de Atenção', 'alternateName' => ['PHDA', 'TDAH', 'Transtorno do Déficit de Atenção com Hiperatividade', 'ADHD']],
        'relacionados' => ['o-que-e-neuropsicologia', 'neurodivergencia', 'o-que-e-aba'],
    ],

    'ansiedade' => [
        'grupo' => 'psicologia',
        'menu' => 'Ansiedade',
        'icone' => 'ansiedade',
        'titulo' => 'Ansiedade: sintomas, tipos e tratamento psicológico',
        'h1' => 'Ansiedade: quando a preocupação passa do limite',
        'descricao' => 'Ansiedade normal ou perturbação de ansiedade? Sintomas, tipos mais comuns (ansiedade generalizada, pânico, ansiedade social) e como a psicoterapia ajuda.',
        'resumo' => 'Sentir ansiedade é natural e, muitas vezes, útil. Quando ela se torna intensa, frequente e começa a limitar a vida, pode tratar-se de uma perturbação de ansiedade, que tem tratamento.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalCondition', 'name' => 'Perturbações de ansiedade', 'alternateName' => ['Ansiedade', 'Transtornos de ansiedade']],
        'relacionados' => ['terapia-cognitivo-comportamental-tcc', 'depressao', 'outros-temas'],
    ],

    'depressao' => [
        'grupo' => 'psicologia',
        'menu' => 'Depressão',
        'icone' => 'depressao',
        'titulo' => 'Depressão: sintomas, causas e tratamento',
        'h1' => 'Depressão: muito mais do que tristeza',
        'descricao' => 'O que é a depressão, sinais e sintomas segundo o DSM-5-TR, diferença entre tristeza e depressão e como a psicoterapia e o acompanhamento médico ajudam.',
        'resumo' => 'A depressão é uma condição de saúde comum e tratável, que vai muito além de um dia mau ou de uma fase triste. Pedir ajuda é um passo importante.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalCondition', 'name' => 'Perturbação depressiva', 'alternateName' => ['Depressão', 'Perturbação depressiva major', 'Transtorno depressivo maior']],
        'relacionados' => ['ansiedade', 'terapia-cognitivo-comportamental-tcc', 'o-que-e-psicologia'],
    ],

    'o-que-e-neuropsicologia' => [
        'grupo' => 'psicologia',
        'menu' => 'O que é Neuropsicologia?',
        'icone' => 'mente',
        'titulo' => 'O que é Neuropsicologia e a avaliação neuropsicológica?',
        'h1' => 'O que é Neuropsicologia?',
        'descricao' => 'O que estuda a Neuropsicologia, o que é a avaliação neuropsicológica, que funções cognitivas avalia, quando é indicada e como decorre o processo.',
        'resumo' => 'A Neuropsicologia estuda a relação entre o funcionamento cerebral e os processos cognitivos, emocionais e comportamentais.',
        'tipo' => 'MedicalWebPage',
        'assunto' => ['@type' => 'MedicalTest', 'name' => 'Avaliação neuropsicológica', 'alternateName' => ['Neuropsicologia', 'Avaliação neuropsicológica']],
        'relacionados' => ['tdah-phda', 'o-que-e-autismo-segundo-o-dsm', 'quem-e-erik-felizardo-psicologo-em-portugal-e-brasil'],
    ],

    'o-que-e-o-dsm' => [
        'grupo' => 'psicologia',
        'menu' => 'O que é o DSM?',
        'icone' => 'duvidas',
        'titulo' => 'O que é o DSM? O manual de diagnóstico explicado',
        'h1' => 'O que é o DSM?',
        'descricao' => 'O que é o DSM (Manual Diagnóstico e Estatístico de Perturbações Mentais), para que serve, a história até ao DSM-5-TR e a diferença para a CID-11.',
        'resumo' => 'O DSM é o Manual Diagnóstico e Estatístico de Perturbações Mentais, publicado pela Associação Americana de Psiquiatria. É uma das principais referências usadas por profissionais de saúde mental em todo o mundo.',
        'tipo' => 'MedicalWebPage',
        'relacionados' => ['o-que-e-autismo-segundo-o-dsm', 'tdah-phda', 'o-que-e-psicologia'],
    ],

    'neurodivergencia' => [
        'grupo' => 'psicologia',
        'menu' => 'Neurodivergência',
        'icone' => 'bem-estar',
        'titulo' => 'Neurodivergência: o que é ser neurodivergente?',
        'h1' => 'Neurodivergência: o que significa?',
        'descricao' => 'O que é neurodiversidade e neurodivergência, quem são as pessoas neurodivergentes (autismo, PHDA, dislexia e outras) e o que é uma prática neuroafirmativa.',
        'resumo' => 'Neurodivergência é um termo usado para descrever pessoas cujo funcionamento neurológico difere do que é considerado típico, como acontece no autismo, na PHDA ou na dislexia.',
        'tipo' => 'MedicalWebPage',
        'relacionados' => ['o-que-e-autismo-segundo-o-dsm', 'tdah-phda', 'o-que-e-aba'],
    ],

    'outros-temas' => [
        'grupo' => 'psicologia',
        'menu' => 'Outros temas relacionados',
        'icone' => 'conversa',
        'titulo' => 'Outros temas: relacionamentos, autoestima, luto e mais',
        'h1' => 'Outros temas relacionados',
        'descricao' => 'Relacionamentos e conflitos conjugais, autoestima, stress e burnout, luto, mudança de país, dificuldades de aprendizagem e outros temas trabalhados em psicoterapia.',
        'resumo' => 'Não existe motivo pequeno para procurar acompanhamento psicológico. Estes são outros temas que surgem com frequência em consulta.',
        'tipo' => 'MedicalWebPage',
        'relacionados' => ['ansiedade', 'depressao', 'atendimento-psicologico'],
    ],

];
