import { useState , useEffect } from "react";
import Axios from "axios";

const getPosts = page => {
    const [restCall, setrestCall] = useState([]);

    useEffect(()=> {
        (async restCall => {
                const response = await Axios.get(`http://laravel.local.test:88/api/${page}`);
                setrestCall(response.data);
            })(page);
    },[])
   
    return restCall;
}
export default getPosts;