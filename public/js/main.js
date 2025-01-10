async function login(){
    let form = document.getElementById("form"),
        formData = new FormData(form);

    const {default: apiFetch } = await import('./utils/apiFetch.js');
    await apiFetch('/login', {method: 'POST', body: formData})
        .then((data) => {
            localStorage.setItem('token', data.tokens)
            window.location.href = '/';
        })
            .catch((error) => {
                console.error(error.data.errors);
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                })
            });
}
// async function register(){
//     let form = document.getElementById("form"),
//         formData = new FormData(form);
//
//     fetch('http://localhost:8080/api/register', {
//         method: 'POST',
//         body: formData,
//     })
//         .then(function (response){
//             if(response.ok){
//                 return response.json();
//             }
//             return Promise.reject(response);
//         })
//         .then(function (data){
//             localStorage.setItem('token', data.token);
//             console.log(localStorage.getItem('token'));
//         })
//         .catch(function (error) {
//             console.error(error);
//         })
// }