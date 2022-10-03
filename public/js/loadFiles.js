
const input =  document.getElementById('photo')
const btn =  document.getElementById('btn-file')
const span =  document.getElementById('placeholder')

// console.log(span);
// console.log(photo);


btn.addEventListener('click', ()=>{
     input.click()
    })
    
input.addEventListener('change', ()=>{
    let file = input.value
    fileSplit = file.split("\\")
    // console.log(fileSplit);
    NameImg = fileSplit[fileSplit.length-1]
    // console.log(NameImg);
    if (NameImg) {
        span.innerHTML= NameImg
    }else{
        span.innerHTML = "Choisissez une nouvelle image"
    }
})
