    let test = document.getElementById("welcomeMessage");
    const regex = RegExp('Julien')
    if(regex.test(test.textContent)){
        alert('Vous êtes Julien !')
    }
    else{
        alert("Vous n'êtes pas Julien !")
    }
