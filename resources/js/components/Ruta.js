import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Catalogo from './Catalogo';
import Producto from './Producto';
import Inicio from './Inicio';

export const Ruta = () => {
    return (

        <Router>
            <>
                <Switch>
                    <Route path='/catalogos' exact component={Catalogo}/>
                    <Route path='/productos' exact component={Producto}/>
                    <Route path='/inicio' exact component={Inicio}/>
                </Switch>
            </>
        </Router>

    )
}


if (document.getElementById('app')) {
    ReactDOM.render(<Ruta />, document.getElementById('app'));
}
