const label1 = document.querySelector('#labelCard1')
const label2 = document.querySelector('#labelCard2')
const label3 = document.querySelector('#labelCard3')

const form_fc1 = document.querySelector('#flipcard1')
const form_fc2 = document.querySelector('#flipcard2')
const form_fc3 = document.querySelector('#flipcard3')

form_fc2.style.display="none"
form_fc3.style.display="none"

label1.addEventListener('click', ()=>{
     label1.classList.add("label-checked")   
     label2.classList.remove("label-checked")   
     label3.classList.remove("label-checked")   

     form_fc1.style.display="flex"
     form_fc2.style.display="none"
     form_fc3.style.display="none"
})
label2.addEventListener('click', ()=>{
     label2.classList.add("label-checked")   
     label1.classList.remove("label-checked")   
     label3.classList.remove("label-checked")   

     form_fc2.style.display="flex"
     form_fc1.style.display="none"
     form_fc3.style.display="none"
})
label3.addEventListener('click', ()=>{
     label3.classList.add("label-checked")   
     label1.classList.remove("label-checked")   
     label2.classList.remove("label-checked")   

     form_fc3.style.display="flex"
     form_fc1.style.display="none"
     form_fc2.style.display="none"
})