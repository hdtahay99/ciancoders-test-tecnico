import React from 'react';
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';

const CategoriaBoton = ({ruta, message}) => {
    return (
        <div className="py-4 mt-5 col-12">

            <a href={ruta} className="btn btn-primary mr-2 text-white">{message}</a>
            
        </div>
    )
}

export default CategoriaBoton;


CategoriaBoton.propTypes = {
    ruta    : PropTypes.string.isRequired,
    message : PropTypes.string.isRequired
}



if (document.getElementById('btn_create')) {
    ReactDOM.render(<CategoriaBoton ruta='/categorias/create' message='Nueva categoría' />, document.getElementById('btn_create'));
}
else if (document.getElementById('btn_back')) {
    ReactDOM.render(<CategoriaBoton ruta='/categorias' message='Regresar' />, document.getElementById('btn_back'));
}

