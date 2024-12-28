document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);  
});

async function formSend(e) {
    e.preventDefault();

    const formData = new FormData(e.target);
    
    let response = await fetch('http://localhost:9000/' ,{
        method :'POST',
        mode : 'cors',  
        body: formData,
    });
    if (response.ok) {
        let result = await response.json;
        alert (result.message);    
        form.reset();   
    }
    else {
        alert ("Ошибка")
    }
}


