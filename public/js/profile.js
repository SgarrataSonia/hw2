
// Casella di input
const insert = document.createElement('input');
insert.setAttribute("type", "text");

 // Bottone di conferma 
 const confirm = document.createElement('input');
 confirm.setAttribute("class", "confirm_button")
 confirm.setAttribute("type", "submit");
 confirm.setAttribute("value", "Conferma");

function onResponse(response)
{
    return response.json();
}

function modCredJson(json)
{
    if (json.esito == "error")
    {
        document.querySelector('span').textContent = json.valore;
        document.querySelector('span').classList.add('error');
    }    
    else if(json.esito == "mod_true") 
    {
        console.log(json);
        document.querySelector('span').textContent = '';
        document.querySelector('span').classList.remove('error');
        window.location.reload(); //ricarica pagina
    }
}

function modificaNome(event)
{
    event.preventDefault();

    const token = document.querySelector("input[name='_token']");

    console.log(token.value);

    const form = document.querySelector("form[id='nome']");
    const formData = new FormData(form);

    for (const value of formData.entries()) {
        console.log(value);
    }

    fetch(BASE_URL + "/modifica_credenziali", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(modCredJson);
}

function onClickNome() 
{
    const formNome = document.querySelector("#nome");
    
    insert.setAttribute("name", "new_nome");
   
    formNome.appendChild(insert);
    formNome.appendChild(confirm);
    confirm.addEventListener('click', modificaNome);
}

function modificaCognome(event)
{
    event.preventDefault();

    const token = document.querySelector("input[name='_token']");

    console.log(token.value);

    const form = document.querySelector("form[id='cognome']");
    const formData = new FormData(form);

    for (const value of formData.entries()) {
        console.log(value);
    }

    fetch(BASE_URL + "/modifica_credenziali", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(modCredJson);
}

function onClickCognome() 
{
    const formCognome = document.querySelector("#cognome");

    insert.setAttribute("name", "new_cognome");
    
    formCognome.appendChild(insert);
    formCognome.appendChild(confirm);
    confirm.addEventListener('click', modificaCognome);
}

function modificaUsername(event)
{
    event.preventDefault();

    const token = document.querySelector("input[name='_token']");

    console.log(token.value);

    const form = document.querySelector("form[id='username']");
    const formData = new FormData(form);

    for (const value of formData.entries()) {
        console.log(value);
    }

    fetch(BASE_URL + "/modifica_credenziali", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(modCredJson);
}

function onClickUsername() 
{
    const formUsername = document.querySelector("#username");

    insert.setAttribute("name", "new_username");
    
    formUsername.appendChild(insert);
    formUsername.appendChild(confirm);
    confirm.addEventListener('click', modificaUsername);
}

function modificaEmail(event)
{
    event.preventDefault();

    const token = document.querySelector("input[name='_token']");

    console.log(token.value);

    const form = document.querySelector("form[id='email']");
    const formData = new FormData(form);

    for (const value of formData.entries()) {
        console.log(value);
    }

    fetch(BASE_URL + "/modifica_credenziali", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(modCredJson);
}

function onClickEmail() 
{
    const formEmail = document.querySelector("#email");

    insert.setAttribute("name", "new_email");
    
    formEmail.appendChild(insert);
    formEmail.appendChild(confirm);
    confirm.addEventListener('click', modificaEmail);
}

function modificaPsw(event)
{
    event.preventDefault();

    const token = document.querySelector("input[name='_token']");

    console.log(token.value);

    const form = document.querySelector("form[id='password']");
    const formData = new FormData(form);

    for (const value of formData.entries()) {
        console.log(value);
    }

    fetch(BASE_URL + "/modifica_credenziali", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(modCredJson);
}

function onClickPsw() 
{
    const formPsw = document.querySelector("#password");
    
    insert.setAttribute("name", "new_psw");

    formPsw.appendChild(insert);
    formPsw.appendChild(confirm);
    
    confirm.addEventListener('click', modificaPsw);
}

const button_nome = document.querySelector("#mod_nome");
button_nome.addEventListener("click", onClickNome);

const button_cognome = document.querySelector("#mod_cognome");
button_cognome.addEventListener("click", onClickCognome);

const button_username = document.querySelector("#mod_username");
button_username.addEventListener("click", onClickUsername);

const button_email = document.querySelector("#mod_email");
button_email.addEventListener("click", onClickEmail);

const button_password = document.querySelector("#mod_psw");
button_password.addEventListener("click", onClickPsw);
