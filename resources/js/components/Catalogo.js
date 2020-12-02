import React from 'react';
import ReactDOM from 'react-dom';
import CatalogoBody from './CatalogoBody';



const Catalogo = () => {
    return (
        <>
            <h2 className="text-center mb-5"> Administra tus catálogos de Productos</h2>
            <CatalogoBody />

        </>
    )
}

export default Catalogo;

if (document.getElementById('catalogo')) {
    ReactDOM.render(<Catalogo />, document.getElementById('catalogo'));
}


