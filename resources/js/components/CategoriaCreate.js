import React from 'react';
import ReactDOM from 'react-dom';
import CategoriaForm from './CategoriaForm';

const CategoriaCreate = () => {
    return (
        <>
            <h2 className="text-center mb-5"> Crear nuevo Categoría de Produtos </h2>

            <CategoriaForm />

        </>
    )
}

export default CategoriaCreate;

if (document.getElementById('categoria_create')) {
    ReactDOM.render(<CategoriaCreate />, document.getElementById('categoria_create'));
}


