import React from 'react';
import ReactDOM from 'react-dom';
import { CatalogoForm } from './CatalogoForm';



const CatalogoCreate = () => {
    return (
        <>
            <h2 className="text-center mb-5"> Crear nuevo Catálogo de Productos </h2>

            <CatalogoForm />

        </>
    )
}

export default CatalogoCreate;

if (document.getElementById('catalogo_create')) {
    ReactDOM.render(<CatalogoCreate />, document.getElementById('catalogo_create'));
}


