// --------------- verification du formaulaire ajouter une photo ---------------

const formImg = document.forms[2]
const alt = document.getElementById('alt')
const nom = document.getElementById('photo')
const btnSub = document.getElementById('ajouter')
let msgErrorLength = document.getElementById("messageErrorLength")
let msgErrorExt = document.getElementById("messageErrorExt")
let check = {}


alt.addEventListener("input", (e) =>{
    let altValue = e.currentTarget.value.trim()
    error = ""
    msgErrorLength.innerHTML = error
    if (!/^\w{1,20}$/.test(altValue)) {
        check = {...check, alt: false}
        error = "votre dexcription doit contenir entre 1 et 20 caractères"
        msgErrorLength.innerHTML = error
    }else{
        check = {...check, alt: true}
    }
    setSubmitBtn()
}) 

nom.addEventListener("input", (e)=>{
    let ImgValue = e.currentTarget.value
    ImgValue = ImgValue.split("\\")
    ImgValue = ImgValue[ImgValue.length-1]
    let ext = nom.value.split(".")[1]
    error = ""
    msgErrorExt.innerHTML = error
    if (ext != "jpeg" && ext != "png" && ext != "jpg") {
        error = "Le champ ne prend en compte ques des fichiers au format png, jpg et jpeg"
        msgErrorExt.innerHTML = error
        check = {...check, file: false}

    }else{
        check = {...check, file: true}
    }
    setSubmitBtn()
})    

function verifForm(){
    var result = true
    if(Object.keys(check).length == 2){
       for (const input in check) {
               const value = check[input]
               result = result && value
               if(result == true){
                console.log(result);
                return result
            }
        } 
        
    }
}

function setSubmitBtn()  {
    if(verifForm()){
        btnSub.removeAttribute("disabled")
        btnSub.classList.remove("btn-form-d")
        btnSub.classList.add("btn-form")
    }
}

// --------------- verification du formaulaire du speach ---------------

const formSpeach = document.forms[3]
const speach = document.getElementById("speach")
const msgErrorSpeach = document.getElementById("messageErrorSpeach")
const btn_speach = document.getElementById("btn-speach")

speach.addEventListener("input", (e)=>{
    speachValue = e.currentTarget.value
    error = ""
    msgErrorLength.innerHTML = error
    if(!/[0-9a-zA-Z\s àâäãçéèêëìîïòôöõùûüñ'-(),;]{20,255}$/.test(speachValue)){
        error = "votre dexcription doit contenir entre 20 et 255 caractères mais aucun caractère spécial"
        msgErrorSpeach.innerHTML = error
        btn_speach.setAttribute("disabled", true)
        btn_speach.classList.remove("btn-form")
        btn_speach.classList.add("btn-form-d")

    }else{
        msgErrorSpeach.innerHTML = ""
        btn_speach.removeAttribute("disabled")
        btn_speach.classList.remove("btn-form-d")
        btn_speach.classList.add("btn-form")
    }
})

// --------------- verification du formaulaire flip Card 1 ---------------

function verifFlipCard(btn, contenu, num, msgErrornum, msgErrorCtn){

check = {}

num.addEventListener("input", (e)=>{
        error = ""
        msgErrornum.innerHTML = error
        num_1Value = e.currentTarget.value
        if (!/^[0-9]{1,3}$/.test(num_1Value)) {
            error = "Vous ne pouvez que renter un nombre de 1 à 3 chiffres"
            msgErrornum.innerHTML = error
            check ={... check, nbr : false }
            console.log(check);
            
        }else{
            check ={... check, nbr : true }
            console.log(check);

        }
})

contenu.addEventListener("input", (e)=> {
    error = ""
    msgErrorCtn.innerHTML = error
    contenu_fp1Value = e.currentTarget.value
    if (!/[0-9a-zA-Z\s àâäãçéèêëìîïòôöõùûüñ'-(),;.]{20,200}$/.test(contenu_fp1Value)) {
        error = "Le contenu doit contenir entre 20 et 200 caractères mais aucun caractère spécial"
        msgErrorCtn.innerHTML = error
        check ={... check, text : false }
            console.log(check);
    }else{
        check ={... check, text : true }
        console.log(check);
    }
    setSubmitBtn()
})


function verifForm(){
    var result = true
    if(Object.keys(check).length == 2){
       for (const input in check) {
               const value = check[input]
               result = result && value
               if(result == true){
                console.log(result);
                return result
            }
        } 
    }
}

function setSubmitBtn()  {
    if(verifForm()){
        btn.removeAttribute("disabled")
        btn.classList.remove("btn-form-d")
        btn.classList.add("btn-form")
    }
}

}

const btn_fc1 = document.getElementById("btn-fc1")
const contenu_fp1 = document.getElementById("contenu-fc1")
const num_1 = document.getElementById("num1")
const msgErrorNum1 = document.getElementById("messageErrorNum1")
const msgErrorFc1 = document.getElementById("messageErrorFc1")

verifFlipCard(btn_fc1, contenu_fp1, num_1, msgErrorNum1, msgErrorFc1)

const btn_fc2 = document.getElementById("btn-fc2")
const contenu_fp2 = document.getElementById("contenu-fc2")
const num_2 = document.getElementById("num2")
const msgErrorNum2 = document.getElementById("messageErrorNum2")
const msgErrorFc2 = document.getElementById("messageErrorFc2")

verifFlipCard(btn_fc2, contenu_fp2, num_2, msgErrorNum2, msgErrorFc2)

const btn_fc3 = document.getElementById("btn-fc3")
const contenu_fp3 = document.getElementById("contenu-fc3")
const num_3 = document.getElementById("num3")
const msgErrorNum3 = document.getElementById("messageErrorNum3")
const msgErrorFc3 = document.getElementById("messageErrorFc3")

verifFlipCard(btn_fc3, contenu_fp3, num_3, msgErrorNum3, msgErrorFc3)

