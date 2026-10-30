<x-layouts.artigo :slug="$slug">
    <h2>Relacionamentos interpessoais e conjugais</h2>
    <p>Conflitos frequentes, dificuldades de comunicação, ciúmes, distanciamento ou padrões que se repetem de relação para relação. O acompanhamento ajuda a compreender o que está em jogo, a expressar necessidades de forma mais clara e a construir relações mais saudáveis, no casal, na família, com amigos ou no trabalho.</p>

    <h2>Autoestima e autoconfiança</h2>
    <p>Autocrítica constante, sensação de não ser suficiente, dificuldade em dizer "não" ou em reconhecer as próprias conquistas. Trabalhar a autoestima é aprender a olhar para si com mais realismo e gentileza.</p>

    <h2>Stress e esgotamento (burnout)</h2>
    <p>Sobrecarga, cansaço que não passa com o descanso, irritabilidade e sensação de não conseguir dar resposta. O esgotamento profissional (burnout) é reconhecido pela Organização Mundial da Saúde como um fenómeno ligado ao trabalho. A psicoterapia ajuda a identificar fontes de stress, definir limites e recuperar o equilíbrio.</p>

    <h2>Luto e perdas</h2>
    <p>A perda de alguém querido, de uma relação, de um emprego ou de um projeto de vida. O luto não tem um prazo certo, mas quando o sofrimento se mantém muito intenso por muito tempo ou impede de retomar a vida, falar com um psicólogo pode ajudar.</p>

    <h2>Mudança de país e adaptação</h2>
    <p>Emigrar traz oportunidades, mas também saudade, solidão, choque cultural e o desafio de reconstruir rotinas e relações. Ter um espaço para falar destas vivências na sua língua faz diferença, seja para brasileiros em Portugal, portugueses no Brasil ou noutros países.</p>

    <h2>Dificuldades de aprendizagem</h2>
    <p>Dislexia, discalculia e outras dificuldades específicas de aprendizagem afetam a leitura, a escrita ou a matemática, apesar de esforço e oportunidades adequadas. Uma <a href="{{ route('paginas.o-que-e-neuropsicologia') }}">avaliação neuropsicológica</a> ajuda a perceber o perfil da criança ou do adulto e a orientar estratégias na escola e em casa.</p>

    <h2>Regulação emocional</h2>
    <p>Emoções muito intensas, explosões de raiva, dificuldade em acalmar ou mudanças bruscas de humor. Aprender a reconhecer, nomear e gerir as emoções é útil em qualquer idade e é uma parte central da <a href="{{ route('paginas.terapia-cognitivo-comportamental-tcc') }}">TCC</a>.</p>

    <h2>Orientação parental</h2>
    <p>Apoio a pais e cuidadores para compreender o comportamento dos filhos, definir rotinas e limites e lidar com desafios do desenvolvimento, incluindo situações de <a href="{{ route('paginas.o-que-e-autismo-segundo-o-dsm') }}">autismo</a> e <a href="{{ route('paginas.tdah-phda') }}">PHDA</a>.</p>

    <h2>Outros temas da Psicologia</h2>
    <ul>
        @foreach (collect(config('paginas'))->where('grupo', 'psicologia')->except($slug) as $outroSlug => $outraPagina)
            <li><a href="{{ route('paginas.'.$outroSlug) }}">{{ $outraPagina['menu'] }}</a></li>
        @endforeach
    </ul>
</x-layouts.artigo>
