const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");



 

form.onsubmit = (e)=>{
    e.preventDefault();
}


sendBtn.onclick = ()=>{
    // console.log("Hello");

    // AJAX

    let xhr = new XMLHttpRequest(); // creating XML DOC
    xhr.open("POST", "php/insert-text.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; //once message is inserted into db leave text box blank
                scrollToBottom();
            }
        }

    }
    // sending form data through ajax to php
    let formData = new FormData(form); // create object
    xhr.send(formData); //sending form data
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    // AJAX

    let xhr = new XMLHttpRequest(); // creating XML DOC

    xhr.open("POST", "php/get-text.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
    
               
            }
        }

    }
    // sending form data through ajax to php
    let formData = new FormData(form); // create object
    xhr.send(formData); //sending form data
    
},500); // runs every 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}