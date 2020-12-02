import React, { useState } from 'react';
import Swal from 'sweetalert2';
import ModalProducto from './ModalProducto';

export const CatalogoForm = () => {

    const [catalogo, setCatalogo] = useState('');

    const [productos, setProductos] = useState([]);

    const handleInput = (e) => {
       setCatalogo( e.target.value);
    }

    const handleSubmit = () => {


        if(catalogo == '' || !productos.length)
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese el nombre del católogo y al menos un producto!',
              })
            return;
        }

        let data = new FormData();

        data.append('nombre_catalogo', catalogo);
        data.append('productos', JSON.stringify(productos));


        productos.forEach((prod, x) => {
            data.append('image'+x, prod.imagen_producto);
        });


        const config = { headers: { 'Content-Type': 'multipart/form-data' } };

        axios.post('/catalogos/post/',
                data,
                config
            )
             .then(resp => {

                console.log(resp);
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'El catálogo se ha registrado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                setCatalogo('');
                setProductos([]);  
             });

        
    }

    const handleViewImage = (imagen, suId) => {

        let reader = new FileReader();

        reader.onload = function (e) {
            $('#'+suId)
                .attr('src', e.target.result)
                .width(75 )
                .height(75);
        };

        reader.readAsDataURL(imagen);
    }

    const handleTrashItem = (e, nombre) => {

        setProductos(productos.filter(prod => prod.nombre_producto != nombre));
    }

    return (
        <div className="row justify-content-center mt-5">

            <div className="col-md-8">

                    <div className="form-group">

                        <label>Nombre del catálogo</label>

                        <input
                            type="text"
                            name="nombre_catalogo"
                            className="form-control"
                            value={catalogo}
                            id="nombre_catalogo"
                            placeholder="Ingrese el nombre del catálogo"
                            onChange={handleInput}
                        />

                    </div>

                    <div className="form-group">
                        <ModalProducto setArrProd={setProductos} />
                    </div>
                    
                    <div className="form-group">

                        <label>Productos Agregados</label>

                        <div className="card">
                            <div className="table-responsive">
                                <table className="table table-hover product_item_list c_table theme-color mb-0">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Categoría</th>
                                            <th>Nombre</th>
                                            <th>Precio Compra</th>
                                            <th>Precio Venta</th>
                                            <th>Imagen</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {

                                            productos.map( (prod, i) => (
                                            <tr key={i}>
                                                <td>
                                                    <div>         
                                                        <button type="button"  className="btn btn-danger btn-sm">
                                                            <i onClick={e => handleTrashItem(e, prod.nombre_producto)} className="zmdi zmdi-delete">Eliminar</i>
                                                        </button>
                                                    </div>
    
                                                </td>
                                                <td>{prod.id_categoria}</td>
                                                <td>{prod.nombre_producto}</td>
                                                <td>{prod.precio_compra}</td>
                                                <td>{prod.precio_venta}</td>
                                                <td>
                                                    <img id={`imagen${i}`} src=""/>
                                                    {
                                                        handleViewImage(prod.imagen_producto, `imagen${i}`)
                                                    }
                                                </td>
                                            </tr>   
                                            ))
                                        }
  
                                    </tbody> 
                                </table>
                            </div>
                        </div>

                    </div>

                    <div className="form-group">

                        <button type="button" className="btn btn-success" onClick={handleSubmit}>
                            Guardar catálogo
                        </button>

                    </div>

            </div>
            
        </div>

    )
}
