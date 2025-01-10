async function login(){
    let form = document.getElementById("form"),
        formData = new FormData(form);

    const {default: apiFetch } = await import('./utils/apiFetch.js');
    await apiFetch('/login', {method: 'POST', body: formData})
        .then((data) => {
            localStorage.setItem('token', data.tokens)
            window.location.href = '/dashboard';
        })
            .catch((error) => {
                console.error(error.data.errors);
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                })
            });
}