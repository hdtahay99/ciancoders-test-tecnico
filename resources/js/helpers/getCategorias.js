export const getCategorias = async(  ) => {

    const url = '/categorias';
    let data = [];

    await axios.get(url).then( resp => {
        let respuesta = resp.data;
        data          = respuesta.categorias;

    });

    const categorias = data.map( cat => {
        return {
            id: cat.id,
            nombre_categoria: cat.nombre_categoria,
        }
    })

    return categorias;


}