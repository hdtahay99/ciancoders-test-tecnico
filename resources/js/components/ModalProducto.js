import React, { useState, useEffect } from 'react';
import Swal from 'sweetalert2';
import { useAxiosCategorias } from '../hooks/useAxiosCategorias';

const ModalProducto = ({setArrProd}) => {


    const { data:cats } = useAxiosCategorias();


    const [producto, setProducto] = useState({
        id_categoria    : 0,
        nombre_producto : '',
        stock_producto  : 0,
        precio_venta    : 0,
        precio_compra   : 0,
        imagen_producto : ''
    })

    useEffect(() => {
        return () => {
            console.log('hola');
            setProducto({
                id_categoria    : 0,
                nombre_producto : '',
                stock_producto  : 0,
                precio_venta    : 0,
                precio_compra   : 0,
                imagen_producto : ''
            })
        }
    }, [])


    const handleInputProducto = (e) => {
        setProducto({...producto, [e.target.name]: e.target.value});
    }

    const handleImage = (e) => {
        setProducto({...producto, [e.target.name]: e.target.files[0]});
    }

    const handleSave = () => {

        if(producto.id_categoria == 0 || producto.nombre_producto == '' || producto.stock_producto == 0 || producto.precio_compra == 0 || producto.precio_venta == 0 || producto.imagen_producto == '')
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese todos los datos del producto!',
              })
            return;
        }

        setArrProd( productos => [producto, ...productos]);
        setProducto({
            id_categoria    : 0,
            nombre_producto : '',
            stock_producto  : 0,
            precio_venta    : 0,
            precio_compra   : 0,
            imagen_producto : ''
        });
        $('#exampleModal').modal('toggle');

    }
    
    const handleClose = () => {
        setProducto({
            id_categoria    : 0,
            nombre_producto : '',
            stock_producto  : 0,
            precio_venta    : 0,
            precio_compra   : 0,
            imagen_producto : ''
        });
    }

    return (
        <>
            <label>Agregar productos</label>

            <button type="button" className="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">
                Insertar productos
            </button>

            <div className="modal fade bd-example-modal-lg" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog modal-lg" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">Inserte un producto</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            <form method="post" encType="multipart/form-data" className="form-horizontal">

                                <div className="form-group">

                                    <label>Categoría</label>


                                    <select className="form-control" name="id_categoria" value={producto.id_categoria} onChange={handleInputProducto}>
                                        <option value="0">Seleccione</option>
                                        {
                                            cats.map((option) => (
                                                <option key={option.id} value={option.id}>{option.nombre_categoria}</option>
                                            ))
                                        }
                                    </select>

                                </div>
                                    
                                    <div className="form-group">

                                        <label>Nombre del producto</label>

                                        <input
                                            type="text"
                                            name="nombre_producto"
                                            className="form-control"
                                            value={producto.nombre_producto}
                                            id="nombre_producto"
                                            placeholder="Ingrese el nombre del producto"
                                            onChange={handleInputProducto}
                                        />

                                    </div>

                                    <div className="form-group">

                                        <label>Stock del producto</label>

                                        <input
                                            type="number"
                                            name="stock_producto"
                                            className="form-control"
                                            value={producto.stock_producto}
                                            id="stock_producto"
                                            placeholder="Ingrese la existencia del producto"
                                            onChange={handleInputProducto}
                                        />

                                    </div>


                                    <div className="form-group">

                                        <label>Precio compra</label>

                                        <input
                                            type="number"
                                            step="any"
                                            name="precio_compra"
                                            className="form-control"
                                            value={producto.precio_compra}
                                            id="precio_compra"
                                            placeholder="Ingrese la existencia del producto"
                                            onChange={handleInputProducto}
                                        />

                                    </div>


                                    <div className="form-group">

                                        <label>Precio venta</label>

                                        <input
                                            type="number"
                                            step="any"
                                            name="precio_venta"
                                            className="form-control"
                                            value={producto.precio_venta}
                                            id="precio_venta"
                                            placeholder="Ingrese la existencia del producto"
                                            onChange={handleInputProducto}
                                        />

                                    </div>

                                    <div className="form-group">
                                        <label>Imagen producto</label>

                                        <input
                                            id="imagen_producto"
                                            type="file"
                                            className="form-control"
                                            name="imagen_producto"
                                            onChange={handleImage} 
                                            accept="image/*"   
                                        >

                                        </input>
                                    </div>
                            </form>
                        </div>
                        <div className="modal-footer">
                            <button type="button" onClick={handleSave} className="btn btn-danger">Agregar</button>
                            <button type="button" onClick={handleClose} className="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </>
    )
}


export default ModalProducto;