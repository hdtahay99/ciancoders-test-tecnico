import React, { useState } from 'react';
import Swal from 'sweetalert2';

const CategoriaForm = () => {

    const [categoria, setCategoria] = useState('');


    const handleInput = (e) => {
        setCategoria(e.target.value);
    }

    const handleSubmit = () => {

        if(categoria == '')
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese el nombre de la categoría!',
              })
            return;
        }

        axios.post('/categorias/post', {nombre_categoria: categoria})
            .then(resp => {
                console.log({resp});
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'La categoría se ha registrado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                setCategoria('');
            }); 

    }
    return (
     <div className="row justify-content-center mt-5">

            <div className="col-md-8">

                    <div className="form-group">

                        <label>Nombre categoría</label>

                        <input
                            type="text"
                            name="nombre_categoria"
                            className="form-control"
                            value={categoria}
                            id="nombre_categoria"
                            placeholder="Ingrese el nombre de la categoría"
                            onChange={handleInput}
                        />

                    </div>

                    <div className="form-group">

                        <button type="button" className="btn btn-success" onClick={handleSubmit}>
                            Guardar Categoría
                        </button>

                    </div>

            </div>
            
        </div>

    )
}


export default CategoriaForm;