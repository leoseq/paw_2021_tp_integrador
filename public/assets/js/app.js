class appPAW {
	constructor() {
		
		// Inicializa la funcionalidad del Drag And Drop
		document.addEventListener("DOMContentLoaded", () => {

			PAW.cargarScript("Carrusel", "assets/js/components/carrusel.js", () => {
				let Imagenes =[
					"/assets/images/portadas/guardia.jpg",
					"/assets/images/portadas/consulta.jpg",
					"/assets/images/portadas/edificio.jpg",
					"/assets/images/portadas/laboral.jpg",
				]
				let carousel = new Carrusel(Imagenes,"#container");
			});
		});

    }
}

let app = new appPAW();
