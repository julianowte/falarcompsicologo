// Menu do celular: abre e fecha o painel de navegação
const botaoMenu = document.querySelector('[data-menu-botao]');
const painelMenu = document.querySelector('[data-menu-painel]');

if (botaoMenu && painelMenu) {
    const alternar = (aberto) => {
        botaoMenu.setAttribute('aria-expanded', String(aberto));
        painelMenu.hidden = !aberto;
        botaoMenu.querySelector('[data-icone-abrir]').classList.toggle('hidden', aberto);
        botaoMenu.querySelector('[data-icone-fechar]').classList.toggle('hidden', !aberto);
    };

    botaoMenu.addEventListener('click', () => alternar(painelMenu.hidden));
    painelMenu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => alternar(false)));
}

// Submenu "Psicologia" no computador: abre no hover/foco (CSS) e também no clique (telas de toque)
const submenu = document.querySelector('[data-submenu]');

if (submenu) {
    const botao = submenu.querySelector('[data-submenu-botao]');
    const painel = submenu.querySelector('[data-submenu-painel]');

    const alternar = (aberto) => {
        botao.setAttribute('aria-expanded', String(aberto));
        painel.toggleAttribute('data-aberto', aberto);
    };

    botao.addEventListener('click', () => alternar(!painel.hasAttribute('data-aberto')));
    document.addEventListener('click', (evento) => {
        if (!submenu.contains(evento.target)) {
            alternar(false);
        }
    });
    document.addEventListener('keydown', (evento) => {
        if (evento.key === 'Escape') {
            alternar(false);
            botao.blur();
        }
    });
}
