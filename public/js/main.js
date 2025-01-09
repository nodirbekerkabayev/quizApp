async function login() {
    let form = document.getElementById("form"),
        formData = new FormData(form);
    const { default: apiFetch} = await import('./utils/apiFetch.js');
    let error;
    await (await apiFetch)('/login', {method: 'POST', body: formData})
        .then(data => console.log(error.data.errors))
            .catch((error) => {
                console.error(error.data.errors);
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1"> ${error.data.errors[err]}</p>`;
            })
        });
}
