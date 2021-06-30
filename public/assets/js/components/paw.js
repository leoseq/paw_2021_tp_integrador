class PAW {

    /**************************************
    * Crear un elemento en el virtual DOM 
    *
    * @tag : String
    * @contenido : String
    * @atributos : {Json} 
    **************************************/ 
    static nuevoElemento(tag, contenido, atributos = {}) {
        let elemento = document.createElement(tag);
    
        for (const atributo in atributos) {
            elemento.setAttribute(atributo, atributos[atributo])
        }
    
        if (contenido.tagName)
            elemento.appendChild(contenido); 
        else
            elemento.appendChild(document.createTextNode(contenido));

        return elemento;
    }   

    
    /**************************************
    * Carga un script
    *
    * @nombre : String
    * @url : String
    * @fnCallback : {Json} 
    **************************************/ 
    static cargarScript (nombre, url, fnCallback = null) {
        let elemento = document.querySelector("script#" + nombre);
        
        if (!elemento) {
            // Creo el tag script
            elemento = this.nuevoElemento("script","",{src: url, id: nombre});
        
            // Funcion de Callback
            if (fnCallback)
                elemento.addEventListener("load", fnCallback);

            document.head.appendChild(elemento);
        }

        return elemento;
    }
}