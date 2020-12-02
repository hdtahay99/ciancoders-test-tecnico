import React, { useState } from 'react';
import Swal from 'sweetalert2';


const CategoriaBody = () => {

    const [categoria, setCategoria] = useState([]);
    
    const getCategorias = async() => {

        const url = '/categorias/listar';

        await axios.get(url).then( resp => {
            let respuesta = resp.data;
            setCategoria(respuesta.categorias);
    
        });
    }

    getCategorias();


    const handleTrashItem = (id) => {

        const url = '/categorias/eliminar';

        Swal.fire({
            title: '¿Está seguro de eliminar este catálogo?',
            showDenyButton: true,
            confirmButtonText: `Guardar cambios`,
            denyButtonText: `Cancelar`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            
              axios.put(url, {id}).then(resp => {
                Swal.fire('La categoría ha sido eliminado!', '', 'success')
                console.log(resp);
              });

            } else if (result.isDenied) {
              Swal.fire('No se ha procedido a eliminar', '', 'info')
            }
            })


    }

    return (
        <div className="col-md-10 mx-auto bg-white p-3">
            <table className="table">
                <thead className="bg-primary text-light">
                    <tr>
                        <th scole="col">Acciones</th>
                        <th scole="col">Nombre Categoría</th>
                        <th scole="col">Estado</th>
                    </tr>
                </thead>

                <tbody>
                    {
                        categoria.map( (cat,x) => (
                            <tr key={x}>
                                <td>
                                    <div>         
                                        <button onClick={() => handleTrashItem(cat.id)}  type="button"  className="btn btn-danger btn-sm">
                                            <i className="zmdi zmdi-delete">Eliminar</i>
                                        </button>
                                    </div>

                                </td>
                                <td>{cat.nombre_categoria}</td>
                                <td>{cat.estado_categoria == '1' ? 'Activo' : 'Eliminado'}</td>
                            </tr>
                        ))
                    }

                </tbody>

            </table>            
        </div>
    )
}

export default CategoriaBody;
