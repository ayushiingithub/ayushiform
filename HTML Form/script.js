const = form = document.querySelector("form"),
        Submit = form.querySelector(".Submit"),
        allInput = form.querySelectorAll(".first input");



Submit.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})     


