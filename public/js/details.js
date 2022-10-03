const open_btn =  document.querySelectorAll('.open')
const close_btn =  document.querySelectorAll('[name="close"]')
const details =  document.querySelectorAll('[name="details"]')

console.log(open_btn);
console.log(close_btn);

for (let i = 0; i < open_btn.length; i++) {
    
    open_btn[i].addEventListener('click', ()=>{
        details[i].classList.remove('hidden')
    })
    
}
for (let i = 0; i < close_btn.length; i++) {
    
    close_btn[i].addEventListener('click', ()=>{
        details[i].classList.add('hidden')
    })
    
}