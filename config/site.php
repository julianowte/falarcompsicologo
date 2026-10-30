<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dados do site e do profissional
    |--------------------------------------------------------------------------
    |
    | Tudo o que aparece no site, nos metadados de SEO, no JSON-LD e no
    | llms.txt sai daqui, para que as informações fiquem sempre iguais.
    |
    */

    'nome' => 'Falar com Psicólogo',

    'psicologo' => [
        'nome' => env('SITE_PSICOLOGO_NOME', 'Erik'),
        'nome_completo' => env('SITE_PSICOLOGO_NOME_COMPLETO', 'Erik dos Santos Felizardo'),
        'registro' => env('SITE_PSICOLOGO_REGISTRO', 'Cédula Profissional OPP nº 32819'),
        'registro_entidade' => 'Ordem dos Psicólogos Portugueses',
        'registro_url' => 'https://www.ordemdospsicologos.pt',
        'nome_publico' => 'Erik Felizardo',
        'titulo' => 'Psicólogo e Neuropsicólogo',
        'formacao' => [
            ['curso' => 'Licenciatura em Psicologia', 'instituicao' => 'Universidade Nove de Julho (UNINOVE)', 'pais' => 'Brasil'],
            ['curso' => 'Mestrado em Neuropsicologia', 'instituicao' => 'Universidade Católica Portuguesa', 'pais' => 'Portugal'],
            ['curso' => 'Grau de Mestre em Psicologia (reconhecimento)', 'instituicao' => 'Universidade do Minho', 'pais' => 'Portugal'],
        ],
        'areas' => ['Terapia Cognitivo-Comportamental', 'Neuropsicologia', 'Avaliação neuropsicológica', 'Perturbações do neurodesenvolvimento', 'Autismo', 'PHDA / TDAH', 'Análise do Comportamento Aplicada (ABA)', 'Ansiedade', 'Depressão', 'Relacionamentos interpessoais e conjugais'],
    ],

    'whatsapp' => [
        'numero' => env('SITE_WHATSAPP_NUMERO', '351915679437'),
        'mensagem' => 'Olá, Erik! Encontrei seu site e gostaria de conversar sobre atendimento.',
    ],

    'cidade' => env('SITE_CIDADE', ''),
    'estado' => env('SITE_ESTADO', ''),

    'descricao' => 'Erik Felizardo, psicólogo e neuropsicólogo (OPP 32819): TCC, avaliação neuropsicológica e neurodesenvolvimento. Online para Portugal e Brasil. Agende pelo WhatsApp.',

    /*
    | Países atendidos: aparecem em destaque no site, no JSON-LD (areaServed) e no llms.txt.
    */
    'paises' => [
        [
            'nome' => 'Portugal',
            'codigo' => 'PT',
            'titulo' => 'Para quem vive em Portugal',
            'texto' => 'Portugueses e brasileiros que moram em Portugal, com sessões em horário de Lisboa. Para quem chegou há pouco, um espaço para falar da adaptação, da saudade e dos recomeços.',
            'linhas_de_apoio' => [
                ['nome' => 'SNS 24', 'numero' => '808 24 24 24', 'detalhe' => 'aconselhamento psicológico'],
                ['nome' => 'Emergência', 'numero' => '112', 'detalhe' => ''],
            ],
        ],
        [
            'nome' => 'Brasil',
            'codigo' => 'BR',
            'titulo' => 'Para quem vive no Brasil',
            'texto' => 'Atendimento para todo o Brasil, com horários combinados no fuso de Brasília. A mesma escuta e o mesmo sigilo de uma sessão presencial, de onde você estiver.',
            'linhas_de_apoio' => [
                ['nome' => 'CVV', 'numero' => '188', 'detalhe' => '24h, gratuito'],
                ['nome' => 'SAMU', 'numero' => '192', 'detalhe' => ''],
            ],
        ],
    ],

    'atualizado_em' => '2026-10-30',

    'temas' => [
        ['icone' => 'ansiedade', 'titulo' => 'Ansiedade', 'texto' => 'Preocupação constante, aperto no peito, pensamentos que não param.', 'pagina' => 'ansiedade'],
        ['icone' => 'depressao', 'titulo' => 'Depressão', 'texto' => 'Quando falta energia, vontade ou sentido, por muito tempo.', 'pagina' => 'depressao'],
        ['icone' => 'estresse', 'titulo' => 'TDAH / PHDA', 'texto' => 'Desatenção, agitação e impulsividade, em crianças e em adultos.', 'pagina' => 'tdah-phda'],
        ['icone' => 'criancas-adolescentes', 'titulo' => 'Autismo', 'texto' => 'Intervenção individualizada para comunicação, autonomia e regulação.', 'pagina' => 'o-que-e-autismo-segundo-o-dsm'],
        ['icone' => 'mente', 'titulo' => 'Avaliação neuropsicológica', 'texto' => 'Atenção, memória, linguagem e funções executivas avaliadas a fundo.', 'pagina' => 'o-que-e-neuropsicologia'],
        ['icone' => 'relacionamentos', 'titulo' => 'Relacionamentos', 'texto' => 'Dificuldades interpessoais e conjugais e padrões que se repetem.', 'pagina' => 'outros-temas'],
        ['icone' => 'autoestima', 'titulo' => 'Autoestima', 'texto' => 'Olhar para si com mais gentileza e reconhecer o próprio valor.', 'pagina' => 'outros-temas'],
        ['icone' => 'localizacao', 'titulo' => 'Mudança de país', 'texto' => 'Saudade, solidão e recomeços, falados na sua língua.', 'pagina' => 'outros-temas'],
    ],

    'etapas' => [
        ['titulo' => 'Mande uma mensagem', 'texto' => 'Clique em "Conversar no WhatsApp" e conte, do seu jeito, o que te trouxe até aqui. Pode ser só um "oi".'],
        ['titulo' => 'Combinamos o horário', 'texto' => 'Eu respondo, tiro suas dúvidas sobre valores e encontramos um horário que caiba na sua rotina, no fuso de Portugal ou do Brasil.'],
        ['titulo' => 'Primeira sessão', 'texto' => 'Uma conversa de cerca de 50 minutos, online ou presencial, para nos conhecermos e entendermos juntos o que você precisa.'],
    ],

    'duvidas' => [
        ['pergunta' => 'Como faço para agendar uma sessão?', 'resposta' => 'O agendamento é feito somente pelo WhatsApp. Clique em qualquer botão "Conversar no WhatsApp" deste site, mande uma mensagem e combinamos o melhor horário para você.'],
        ['pergunta' => 'Você atende quem mora fora de Portugal e do Brasil?', 'resposta' => 'Sim! Atendo pessoas de diferentes países que falam português, incluindo brasileiros, portugueses e outros falantes da língua portuguesa espalhados pelo mundo. As sessões online são realizadas por videochamada, em português. Também ofereço atendimento presencial em Portugal.'],
        ['pergunta' => 'Como funciona a diferença de fuso horário?', 'resposta' => 'Portugal está 3 ou 4 horas à frente de Brasília, conforme a época do ano. Os horários são sempre combinados pelo WhatsApp já no seu fuso, para não haver confusão.'],
        ['pergunta' => 'O atendimento é online ou presencial?', 'resposta' => 'As duas modalidades estão disponíveis. O atendimento online é realizado por videochamada, em português, de onde você estiver no mundo. O atendimento presencial é realizado exclusivamente em Portugal, podendo ocorrer em consultório, ao domicílio ou em contexto escolar. A modalidade é combinada previamente pelo WhatsApp, de acordo com as suas necessidades.'],
        ['pergunta' => 'Atende crianças e adolescentes?', 'resposta' => 'Sim. Acompanho pessoas de diferentes idades, incluindo crianças e adolescentes, sobretudo na intervenção no neurodesenvolvimento (autismo e PHDA) e na avaliação neuropsicológica, com articulação com a família e a escola quando pertinente.'],
        ['pergunta' => 'Quanto tempo dura cada sessão?', 'resposta' => 'Cada sessão dura cerca de 50 minutos. A frequência mais comum é semanal, mas ela é combinada com você.'],
        ['pergunta' => 'O que eu falo na sessão fica em sigilo?', 'resposta' => 'Sim. O sigilo é um dever ético do psicólogo, previsto no Código Deontológico da Ordem dos Psicólogos Portugueses. O que você conta fica entre nós.'],
        ['pergunta' => 'Preciso estar muito mal para procurar terapia?', 'resposta' => 'Não. A terapia ajuda em momentos difíceis, mas também é um espaço para se conhecer melhor, organizar ideias e cuidar da saúde emocional antes que o peso aumente.'],
        ['pergunta' => 'Quanto custa uma sessão e como pago?', 'resposta' => 'Os valores, em euros ou em reais, e as formas de pagamento para Portugal e para o Brasil são informados pelo WhatsApp, junto com os horários disponíveis.'],
        ['pergunta' => 'E se eu estiver em crise agora?', 'resposta' => 'Se você está em sofrimento intenso ou em risco, procure ajuda imediata. Em Portugal, ligue SNS 24 (808 24 24 24) ou, em emergência, 112. No Brasil, ligue 188 para o CVV, que atende 24 horas e de graça, ou 192 (SAMU) em emergência.'],
    ],

];
