const btn_accept = document.querySelectorAll('.btn-accept')
const btn_decline = document.querySelectorAll('.btn-decline')
const form_accept = document.querySelectorAll('[name = "devis"]')
const form_decline = document.querySelectorAll('[name = "decline"]')


for (let i = 0; i < btn_accept.length; i++) {
    
    btn_accept[i].addEventListener('click', ()=>{
            
            form_decline[i].classList.add("hidden")
            form_accept[i].classList.remove("hidden")

    })
}

for (let i = 0; i < btn_decline.length; i++) {
    
    btn_decline[i].addEventListener('click', ()=>{

        form_accept[i].classList.add("hidden")
        form_decline[i].classList.remove("hidden")
    })
}

