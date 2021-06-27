# <img src="http://www.atunlu.org.ar/wp-content/uploads/2018/12/logo-unlu.png" height="60" width="60"/> Programación en Ambiente Web 2021 - TP Integrador

#### Tabla de Contenidos
1. [Info del Grupo](#info-del-grupo)
2. [Instalación](#instalación)
3. [Site Map](#site-map)
4. [Maquetación](#maquetación)

---

## Info del Grupo
#### **_Autores:_**
| Alumno | Legajo |
| :--------- | :--------- |
| Bert, Joaquin | 133168 |
| Sequeira, Leonardo | 112776 |

---

## Instalación
Pasos a ejecutar:

* Clonar el proyecto:
```
git clone https://github.com/leoseq/paw_2021_grupo5.git
```
* Desde el directorio raiz del proyecto ejecutar el siguiente comando: 
```
composer install
```
* Copiar el archivo `.env.example` bajo el nombre `.env` y editarlo con los datos de la DB a conectarse:

* Ejecutar la migrations:
```
./vendor/bin/phinx migrate -e development
```

* Levantar el servidor web stand alone desde el directorio raiz:
```
Ejecutar php -S localhost:8000 -t public
```
 
---

## Site Map


---

## Maquetación 
* [**Link a Figma**](https://www.figma.com/file/MK7rWjurfTGyPTFLBqy9gA/Wireframs?node-id=0%3A1)
