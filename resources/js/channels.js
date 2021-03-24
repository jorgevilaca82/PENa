window.Spruce.store('processos', {
    all: [],
    add(processo) {
        this.all.unshift(processo);
    }
})

document.addEventListener('DOMContentLoaded', () => {

    if (Notification.permission !== 'granted') {
        Notification.requestPermission().then((permission) => {
            new Notification('Obrigado! 😉');
        })
    }

    const uoCodProtocolo = document.querySelector('meta[name="cod-protocolo"]').content;

    // Conecta ao canal e ouve os eventos
    Echo.private(`processoEletronico.${uoCodProtocolo}`)
        .listen('.processoEletronico.iniciado', (e) => {
            const processos = Spruce.store('processos')
            processos.add(e.processoEletronico);
            const pe = e.processoEletronico;
            new Notification(`O processo ${pe.nup17} \n foi criado na sua unidade`);
        });
})