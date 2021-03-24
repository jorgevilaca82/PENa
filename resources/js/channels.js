const orgId = 23243; // TODO: recupar de uma tag meta no head?

window.Spruce.store('processos', {
    all: [],
    add(processo) {
        this.all.unshift(processo);
    }
})

Echo.private(`processoEletronico.${orgId}`)
    .listen('.processoEletronico.iniciado', (e) => {
        const processos = Spruce.store('processos')
        processos.add(e.processoEletronico);
        const pe = e.processoEletronico;
        new Notification(`O processo ${pe.nup17} \n foi criado na sua unidade`);
    });