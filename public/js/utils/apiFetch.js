function apiFetch(uri,options={}){
    const baseUrl='https://6790cf0c62db3.xvest6.ru/api',
        token=localStorage.getItem('token');
    const defailtHeaders={};
    if (token){
        defailtHeaders.Authorization=`Bearer ${token}`;
    }
    return fetch(`${baseUrl}${uri}`,{
        ...options,
        headers:{...defailtHeaders,...options.headers},
    })
        .then(async response=>{
            if(!response.ok){
                if(response.status === 401){
                    if(window.location.pathname === '/login' || window.location.pathname === '/register'){
                    }else{
                        window.location.href='/login';
                    }
                }
                const error=new Error("HTTP error");
                error.data=await response.json();

                throw error;
            }
            return response.json();
        })

        .catch(async error => {
            throw error;
        })
}
export default apiFetch;
