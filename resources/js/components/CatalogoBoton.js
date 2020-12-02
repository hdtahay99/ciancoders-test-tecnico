import React from 'react'
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types'

export const CatalogoBoton = ({ruta, message}) => {
    return (
        <div className="py-4 mt-5 col-12">

    <a href={ruta} className="btn btn-primary mr-2 text-white">{message}</a>
            
        </div>
    )
}

CatalogoBoton.propTypes = {
    ruta    : PropTypes.string.isRequired,
    message : PropTypes.string.isRequired
}



if (document.getElementById('boton_create')) {
    ReactDOM.render(<CatalogoBoton ruta='/catalogos/create' message='Crear Catálogo' />, document.getElementById('boton_create'));
}
else if (document.getElementById('boton_back')) {
    ReactDOM.render(<CatalogoBoton ruta='/catalogos' message='Regresar' />, document.getElementById('boton_back'));
}
