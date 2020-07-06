$(function () {
    let hasError = false;
    const showError = (element, message) => {
        let parent = element.parentElement.parentElement;
        const msgDisplayer = parent.querySelector(".show-error");
        msgDisplayer.textContent = message;
    };
    $("#studentSubscribtionForm input").on("blur", function () {
        if(!this.value){
            hasError = true;
            showError(this,"Ce champs est obligatoire");
        }
        if(this.type == "tel" && this.value){
            const regex = /^(002217|7)(0|7|8){1}[0-9]{7}/;
            if(!regex.test(this.value)){
                hasError = true;
                showError(this,"Un nummero valide est sous la forme 7xxxxxxxx");
            }
        }else if(this.type == "email" && this.value){
            const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!regex.test(this.value)){
                hasError = true;
                showError(this,"Un email valide est sous la forme exemple@exemple.com");
            }
        }else if((this.type == "text" && this.value) && (this.value.length < 4 && this.getAttribute("name") == "prenom")){
            hasError = true;
            showError(this,"La longueur minimale est de 4 caracteres.");
        }
    });
    $("#studentSubscribtionForm input").on("input", function () {
        showError(this,"");
        hasError = false;
    });
    $("#studentSubscribtionForm").on("submit", function (event) {
        const inputs = document.querySelectorAll("#studentSubscribtionForm input");
        for (const input of inputs) {
            if (!input.value) {
                hasError = true;
                showError(input,"Ce champs est obligatoire");
            }else if(input.type == "text" && input.value.length < 2){
                hasError = true;
                showError(input,"La longueur minimale est de 2 caracteres.");
            }
        }
        if(hasError){
            event.preventDefault();
        }
    });
   
});