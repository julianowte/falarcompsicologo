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
