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
                
                if (response.code != 0) {

<<<<<<< HEAD
					$('#itemMovies').html('<tr></tr>');		
					
					$.each(response.data,function(key,value) {
						
						htmlContent = '<td>' +  '<img src="'+ value.mov_poster + '" alt="img"></td>'
									+ '<td>#' + value.mov_id + '</td>'
									+ '<td>'
										+ '<a href="details.php?mov_id="' + value.mov_id + '><strong>' + value.mov_title  + '</strong></a>'
									+ '</td>'
									+ '<td class="well">' + value.mov_synopsis + '</td>'								   
								    + '<td>' 
								    + '<a class="btn btn-xs btn-success" href="details.php?mov_id="' + value.mov_id + '>Détails..</a>'
								    + '<br>'
								    + '<br>'
								    + '<a class="btn btn-xs btn-success" href="update-movie.php?mov_id="' + value.mov_id + '>Modifier</a></td>'
								    ;
							
						$('#itemMovies').append('<tr>' + htmlContent + '</tr>');
			
=======
                    $.each(response,function(key,value) {
                        $('#itemMovies').html('<tr></tr>');        
                        htmlContent = '<td>' + value.data.mov_poster + '</td>'
                                    + '<td>' + value.data.mov_id + '</td>'
                                    + '<td>' + value.data.mov_title + '</td>'
                                    + '<td>' + value.data.mov_synopsis + '</td>'                                   
                                    + '<td>' + '<a class="btn btn-xs btn-success" href="details.php?mov_id="' + data.mov_id + '">"Détails</a></td>'
                                    + '<td>' + '<a class="btn btn-xs btn-success" href="update-movie.php?mov_id="' + data.mov_id + '">"Modifier</a></td>'                                    
                            
                        $('#itemMovies').html('<tr>' + htmlContent + '</tr>');
        
>>>>>>> ffdca784488427094d211c61d14c36fd5128b9de

                    });

                } else {
                    console.log('Aucun film trouvé');
                }
                
        }
    });
}