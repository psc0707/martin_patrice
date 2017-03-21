$(document).ready(function() {
	var listFilms;	
	param = {
					page : 1,
					pagination : 5
			};

	loadMovies();
});

//Fonction permettant de charger tous les salons de discussion
function loadMovies(){
	$.ajax({
		method: 'GET',
		url: 'ajax/catalog.php',
		dataType:'json',
		data: param,
		success: function(response){
				// console.log(response + ' '+ response.code);
				if (response.code != 0) {

					$('#itemMovies').html('');
					
					$.each(response.data,function(key,value) {
						
						htmlContent = '<td>' +  '<img src="'+ value.mov_poster + '" alt="img"></td>'
									+ '<td>#' + value.mov_id + '</td>'
									+ '<td>'
										+ '<a href="details.php?mov_id="' + value.mov_id + '><strong>' + value.mov_title  + '</strong></a>'
									+ '</td>'
									+ '<td class="well">' + value.mov_synopsis + '</td>'								   
								    + '<td>' 
								    + '<a class="btn btn-xs btn-success" href="details.php?movId="' + value.mov_id + '>Détails..</a>'
								    + '<br>'
								    + '<br>'
								    + '<a class="btn btn-xs btn-success" href="update-movie.php?movId="' + value.mov_id + '>Modifier</a></td>'
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
