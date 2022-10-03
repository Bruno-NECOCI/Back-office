
const checks = document.getElementsByName('img')
const active = document.querySelector('#active')
const supp = document.querySelector('#supp')
const update = document.querySelector('#update')

checks.forEach(check => { 
    check.addEventListener('change', ()=>{
        // let valueActive = active.getAttribute('src')

        // j'implante le nouveau src de l'image checked
        let srcActive = "./img/"+check.value
        active.setAttribute('src', srcActive)
        
        // j'implante la nouvelle id de l'image checked dans supp
        idImgSupp = "contenu/supp-acc/"+check.getAttribute('id')
        supp.setAttribute('href', idImgSupp)
        
        // j'implante la nouvelle id de l'image checked dans update
        idImgUpdate = "contenu/update-acc/"+check.getAttribute('id')
        update.setAttribute('href', idImgUpdate)

    })
})
