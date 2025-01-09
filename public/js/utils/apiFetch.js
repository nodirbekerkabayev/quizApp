function apiFetch(uri,options={}){
    const baseUrl='http://localhost:8080/api',
        token=localStorage.getItem('token');
    const defailtHeaders={};
    if (token){
        defailtHeaders.Authorization=`Bearer ${token}`;
    }
    return fetch(`${baseUrl}${url}`,{
        ...options,
        headers:{...defailtHeadersders,...options.headers},
    })
        .then(async response=>{
            if(!response.ok){
                const error=new Error("HTTP error");
                error.data=await response.json();
                throw error;
            }
            return response.json();
        })
        .catch(error=>{
            throw error;
        })
}

export default apiFetch()