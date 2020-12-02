import React, { useEffect, useState } from 'react';
import Swal from 'sweetalert2';
import CatalogoShow from './CatalogoShow';


const CatalogoBody = () => {

    const [codigo, setCodigo] = useState(0);

    const [catalogos, setCatalogos] = useState([]);

    const [bandera, setBandera] = useState(false);


    useEffect(() => {
        
        return () => {
            setCatalogos([]);
            setBandera(false);
            setCodigo(0);
        }
    }, [])

    const getCatalogos = async() => {

        const url = '/catalogos/listar';

        await axios.get(url).then( resp => {
            let respuesta = resp.data;
            setCatalogos(respuesta.catalogos);
    
        });
    }

    getCatalogos();

    const handleTrashItem = (id) => {

        const url = '/catalogos/eliminar';

        Swal.fire({
            title: '¿Está seguro de eliminar este catálogo?',
            showDenyButton: true,
            confirmButtonText: `Guardar cambios`,
            denyButtonText: `Cancelar`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            
              axios.put(url, {id}).then(resp => {
                Swal.fire('El catálogo ha sido eliminado!', '', 'success')
                console.log(resp);
              });

            } else if (result.isDenied) {
              Swal.fire('No se ha procedido a eliminar', '', 'info')
            }
            })


    }

    const handleViewCatalogo = (id) => {

        setCodigo(id);
        setBandera(true);

    }


    return (
        <div className="col-md-10 mx-auto bg-white p-3">

            {
                (bandera == false) ? (
            <>
                <table className="table">
                    <thead className="bg-primary text-light">
                        <tr>
                            <th scole="col">Acciones</th>
                            <th scole="col">Nombre Catálogo</th>
                            <th scole="col">Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        {
                            catalogos.map( (cat,x) => (
                                <tr key={x}>
                                    <td>
                                        <div>         
                                            <button onClick={() => handleTrashItem(cat.id)}  type="button"  className="btn btn-danger btn-sm">
                                                <i className="zmdi zmdi-delete">Eliminar</i>
                                            </button>
                                            <button onClick={e => handleViewCatalogo(cat.id)} type="button"  className="btn btn-success btn-sm ml-2">
                                                <i className="zmdi zmdi-watch">Ver</i>
                                            </button>
                                        </div>

                                    </td>
                                    <td>{cat.nombre_catalogo}</td>
                                    <td>{cat.estado_catalogo == '1' ? 'Activo' : 'Eliminado'}</td>
                                </tr>
                            ))
                        }

                    </tbody>

                </table>

            </>
            
            ) 
            : 
                (
                    <CatalogoShow codigo={codigo} ban={setBandera} />
                )
            }

        </div>
    )
}


export default CatalogoBody;
