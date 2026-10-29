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
        'nome' => env('SITE_PSICOLOGO_NOME', 'Erick'),
        'nome_completo' => env('SITE_PSICOLOGO_NOME_COMPLETO', 'Erick'),
        'crp' => env('SITE_PSICOLOGO_CRP', 'CRP 00/00000'),
    ],

    'whatsapp' => [
        'numero' => env('SITE_WHATSAPP_NUMERO', '351915679437'),
        'mensagem' => 'Olá, Erick! Encontrei seu site e gostaria de conversar sobre atendimento.',
    ],

    'cidade' => env('SITE_CIDADE', ''),
    'estado' => env('SITE_ESTADO', ''),

    'descricao' => 'Psicólogo Erick: terapia online para quem vive em Portugal, no Brasil ou no exterior, em português. Acolhimento, escuta e sigilo. Agende pelo WhatsApp.',

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

    'atualizado_em' => '2026-10-29',

    'temas' => [
        ['icone' => 'ansiedade', 'titulo' => 'Ansiedade', 'texto' => 'Preocupação constante, aperto no peito, pensamentos que não param. Entender o que está por trás ajuda a respirar de novo.'],
        ['icone' => 'depressao', 'titulo' => 'Depressão e desânimo', 'texto' => 'Quando falta energia, vontade ou sentido. Um espaço para falar do peso sem ser julgado.'],
        ['icone' => 'autoestima', 'titulo' => 'Autoestima', 'texto' => 'Aprender a se olhar com mais gentileza e a reconhecer o próprio valor.'],
        ['icone' => 'relacionamentos', 'titulo' => 'Relacionamentos', 'texto' => 'Conflitos no namoro, no casamento, na família ou no trabalho, e os padrões que se repetem.'],
        ['icone' => 'estresse', 'titulo' => 'Estresse e esgotamento', 'texto' => 'Rotina pesada, cobrança, cansaço que não passa com o fim de semana.'],
        ['icone' => 'luto', 'titulo' => 'Luto e perdas', 'texto' => 'Perdas de pessoas, de relações ou de planos. Cada luto tem seu tempo.'],
        ['icone' => 'autoconhecimento', 'titulo' => 'Autoconhecimento', 'texto' => 'Entender suas escolhas, emoções e o que você quer para a sua vida.'],
        ['icone' => 'localizacao', 'titulo' => 'Mudança de país', 'texto' => 'Morar longe de casa traz saudade, solidão e recomeços. Um espaço para viver essa mudança na sua língua.'],
    ],

    'etapas' => [
        ['titulo' => 'Mande uma mensagem', 'texto' => 'Clique em "Conversar no WhatsApp" e conte, do seu jeito, o que te trouxe até aqui. Pode ser só um "oi".'],
        ['titulo' => 'Combinamos o horário', 'texto' => 'Eu respondo, tiro suas dúvidas sobre valores e encontramos um horário que caiba na sua rotina, no fuso de Portugal ou do Brasil.'],
        ['titulo' => 'Primeira sessão', 'texto' => 'Uma conversa de cerca de 50 minutos por videochamada, para nos conhecermos e entendermos juntos o que você precisa.'],
    ],

    'duvidas' => [
        ['pergunta' => 'Como faço para agendar uma sessão?', 'resposta' => 'O agendamento é feito somente pelo WhatsApp. Clique em qualquer botão "Conversar no WhatsApp" deste site, mande uma mensagem e combinamos o melhor horário para você.'],
        ['pergunta' => 'Você atende quem mora em Portugal e no Brasil?', 'resposta' => 'Sim. Atendo pacientes que vivem em Portugal e no Brasil, e também brasileiros e portugueses que moram em outros países. As sessões são em português, por videochamada.'],
        ['pergunta' => 'Como funciona a diferença de fuso horário?', 'resposta' => 'Portugal está 3 ou 4 horas à frente de Brasília, conforme a época do ano. Os horários são sempre combinados pelo WhatsApp já no seu fuso, para não haver confusão.'],
        ['pergunta' => 'Como é a sessão online?', 'resposta' => 'A sessão acontece por videochamada, de onde você estiver. Você só precisa de internet e de um lugar reservado. O cuidado e o sigilo são os mesmos de uma sessão presencial.'],
        ['pergunta' => 'Quanto tempo dura cada sessão?', 'resposta' => 'Cada sessão dura cerca de 50 minutos. A frequência mais comum é semanal, mas ela é combinada com você.'],
        ['pergunta' => 'O que eu falo na sessão fica em sigilo?', 'resposta' => 'Sim. O sigilo é um dever ético do psicólogo, previsto no Código de Ética Profissional do Psicólogo. O que você conta fica entre nós.'],
        ['pergunta' => 'Preciso estar muito mal para procurar terapia?', 'resposta' => 'Não. A terapia ajuda em momentos difíceis, mas também é um espaço para se conhecer melhor, organizar ideias e cuidar da saúde emocional antes que o peso aumente.'],
        ['pergunta' => 'Quanto custa uma sessão e como pago?', 'resposta' => 'Os valores, em euros ou em reais, e as formas de pagamento para Portugal e para o Brasil são informados pelo WhatsApp, junto com os horários disponíveis.'],
        ['pergunta' => 'E se eu estiver em crise agora?', 'resposta' => 'Se você está em sofrimento intenso ou em risco, procure ajuda imediata. Em Portugal, ligue SNS 24 (808 24 24 24) ou, em emergência, 112. No Brasil, ligue 188 para o CVV, que atende 24 horas e de graça, ou 192 (SAMU) em emergência.'],
    ],

];
