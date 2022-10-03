const radioId = document.getElementsByName("img")
const btns = document.getElementsByClassName("change")

radioId.forEach(radio => {
    radio.addEventListener('change', ()=>{
        let id = radio.getAttribute('id')
        for (let i = 0; i < btns.length; i++) {
            btns[i].value = id  
        }
    })
});