const makeItRain = () => {
    // Limpa toda a chuva
    $('.rain').empty()

    let increment = 0
    let drops = ""
    let backDrops = ""

    while (increment < 100) {
        // Acoplar números aleatórios para usar em várias randomizações
        // número aleatório entre 98 e 1
        let randoHundo = (Math.floor(Math.random() * (98 - 1 + 1) + 1))
        // número aleatório entre 5 e 2
        let randoFiver = (Math.floor(Math.random() * (5 - 2 + 1) + 2))
        // incrementa
        increment += randoFiver
        // adicionar uma nova gota de chuva com várias randomizações para certas propriedades CSS
        drops += '<div class="drop" style="left: ' + increment + '%; bottom: ' + (randoFiver + randoFiver - 1 + 100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div></div>'
        
        backDrops += '<div class="drop" style="right: ' + increment + '%; bottom: ' + (randoFiver + randoFiver - 1 + 100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div></div>'
    }

    $('.rain.front-row').append(drops)
    $('.rain.back-row').append(backDrops)
}

makeItRain()
