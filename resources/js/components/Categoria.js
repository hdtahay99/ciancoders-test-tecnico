import React from 'react';
import ReactDOM from 'react-dom';
import CategoriaBody from './CategoriaBody';

const Categoria = () => {
    return (
        <>
            <h2 className="text-center mb-5">Categorías para productos</h2>
            <CategoriaBody />
        </>
    )
}


export default Categoria;

if (document.getElementById('categoria')) {
    ReactDOM.render(<Categoria />, document.getElementById('categoria'));
}
