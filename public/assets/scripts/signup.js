
const formsignup = document.querySelector("#form-signup");
const message = document.querySelector("#message");

function setMessage(messageText){

    message.classList.add('text-error');
    message.textContent = messageText;
    
    setTimeout(()=>{
        message.textContent = '';
    }, 3000);
}

formsignup.addEventListener('submit', async (event) => {
    event.preventDefault();
    
    axios.post('/signup').then((response) => {
        console.log(response.data);
    });
    
    // try {
    //     const formData = new FormData(form);

    //     // const {data} = await axios.post('/login', formData);
    //     axios.post('/signup').then((response) => {
    //         console.log(response.data);
    //     });
        

    //     // (data == 'loggedIn') ?
    //     //     window.location.href = '/admin/painel' :
    //     //     setMessage('Erro ao fazer o login');
        

    // } catch (error) {
    //     // setMessage('Erro ao fazer o login');
       
    // }

});

