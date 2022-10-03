const checkNbr = document .getElementById("nbrClient")
const container = document.getElementById("container_client")

console.log(checkNbr);
console.log(container);

checkNbr.addEventListener('click', ()=>{
    if (checkNbr.checked) {
        container.classList.remove("hidden")
    }else{
        container.classList.add("hidden")
    }
})