$(document).ready(function() {
	var listFilms;	
	loadMovies();
});

//Fonction permettant de charger tous les salons de discussion
function loadMovies(){
	$.ajax({
		method: 'GET',
		url: 'ajax/catalog.php',
		dataType:'json',
		data:{},
		success: function(response){
				// console.log(response + ' '+ response.code);
				if (response.code != 0) {

					$('#itemMovies').html('<tr></tr>');		
					
					$.each(response.data,function(key,value) {
						
						htmlContent = '<td>' +  '<img src="'+ value.mov_poster + '" alt="img"></td>'
									+ '<td>' + value.mov_id + '</td>'
									+ '<td>' + value.mov_title + '</td>'
									+ '<td>' + value.mov_synopsis + '</td>'								   
								    + '<td>' 
								    + '<a class="btn btn-xs btn-success" href="details.php?mov_id="' + value.mov_id + '>Détails..</a>'
								    + '<br>'
								    + '<br>'
								    + '<a class="btn btn-xs btn-success" href="update-movie.php?mov_id="' + value.mov_id + '>Modifier</a></td>'
								    ;
							
						$('#itemMovies').append('<tr>' + htmlContent + '</tr>');
			

					});

				} else {
					console.log('Aucun film trouvé');
				}		
		},
		error : function(error) {
			/* Act on the event */
			console.log(error) ;
			console.log("Error Ajax");
		}
	});
}
