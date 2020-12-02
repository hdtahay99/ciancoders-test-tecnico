import { useState, useEffect } from 'react'
import { getCategorias } from '../helpers/getCategorias';

export const useAxiosCategorias = () => {

    const [state, setState] = useState({
        data: [],
        loading: true
    });

    useEffect( () => {

        getCategorias(  )
            .then( cats => {
                
                setState({
                    data: cats,
                    loading: false
                });
            })

    }, [])




    return state; // { data:[], loading: true };
}
