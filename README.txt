# Dinamic-Searching-For-Wordpress
A dinamic searching of university courses by province, city and country taken data from MySQL DB

Este Repositorio se divide en 3 apartados



1.- Al iniciar la pagina encontramos nos mostrara todos los cursos Universitarios disponibles para estudiar. 
    Los cursos se dividen en 4 categorias diferentes creadas en MySQl como campos que son:
      
 -Grados universitarios
      
 -Dobles Grados
      
 -Grado Superior
      
 -Grado Medio
    
  
  En la página principal encontramos 4 botones con cada una de las categorias a elegir y un buscador general. 
    
  Si escribimos en el buscador nos buscara dinamicamente resultados que coincidan con los caracteres buscados. 
    Nos buscara entre todos los grados disponibles(*Sin repetirse por nombre ya que hay muchos que se se llaman igual*)
    
   

 Depende en que boton pulsemos nos buscara con una consulta AJAX los cursos que coincidan con esa catgoría. Por  ejemplo: si pulsamos grado-medio encontraremos todos los grados medios disponibles.
    
    

*Todos los cursos estan cogidos de un documento excel importado a la base de datos*
    


  2.-En cada fila de la tabla dinamicanos devuelve un boton de "Donde estudiar" que si hacemos click nos mostrara los SELECT dinamicos
 donde las opciones iran cambiando dependiendo de los campos  de la base de datos en este caso los campos:
      
  -Provincia
      
  -Ciudad
      
  -Modalidad(Presencial, Online..)
 

 Podremos ir buscando segun vayamos seleccionando opciones: Seleccionada Provincia("Madrid") nos mostrara   dinamicamente que curso
 del seleccionado se imparte en Madrid. 
 Podremos especificar mas seleccionando la ciudad o la modalidad, asi hasta encontrar el que deseemos.
 
 

3.-Una vez encontrado el curso contendra un input de "Solicitar informacion" donde nos llevara a un formulario donde podremos consultar
 con el centro donde se imparte el grado o la carrera que hemos encontrado.
 
 

/* Todo esta adaptado para trabajar en Wordpress en una pagina creada nueva */