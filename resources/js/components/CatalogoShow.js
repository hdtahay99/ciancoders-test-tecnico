import React, { useState } from 'react'

const CatalogoShow = ({codigo, ban}) => {

    const [catalogo, setCatalogo] = useState([]);

    const obtenerCatalogoItems = async () => {
        
        await axios.get('/catalogos/show?id='+codigo)
            .then(resp => {
                let respuesta = resp.data;
                setCatalogo(respuesta.catalogos);
            })
    }

    obtenerCatalogoItems();

    const handleChangeBan = () => {
        ban(false);
    }


    return (
        <>
        <div className="mt-1 col-12">

            <a onClick={handleChangeBan} className="btn btn-primary mr-2 text-white">Regresar</a>

        </div>
        {
            catalogo.map((cat, x) => (


                <div key={x} className="container">
                    <h2 className="titulo-categoria text-uppercase mt-5 mb-4">
                        Catálogo: {cat.nombre_catalogo}
                    </h2>

                    <div className="row">

                        {
                            cat.productos.map((prod, i) => (
                                
                                <div key={i} className="card shadow">
                                    <img className="card-img-top" src={`/storage/${prod.imagen_producto}`} alt="imagen receta"/>
                                    <div className="card-body">
                                        <h3 className="card-title">{prod.nombre_producto}</h3>

                                        <div className="meta-receta d-flex justify-content-between">

                                            <p className="text-primary fecha font-weight-bold">
                                                Q {prod.precio_venta}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            ))
                        }

                    </div>



                </div>

            ))
        }
        </>
            
    )
}

export default CatalogoShow;

if (document.getElementById('catalogo_show')) {
    ReactDOM.render(<CatalogoShow />, document.getElementById('catalogo_show'));
}

