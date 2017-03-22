var imdb_data;

$(document).ready(function() {

// Pré-remplir un film via Imdb
//-------------------------------
	$("#imdb" ).on( "submit", function( event ) {		
		event.preventDefault();
		// searchMovie = $( this ).serialize();
		searchMovie = $('#imdb input').val();
		// console.log(searchMovie);
	    $.ajax({
	        method: "GET",
	        url: "http://www.omdbapi.com",
	        data: {
	              t : searchMovie
	            },
	        dataType : 'json'
	        })
	        .done(function(response) {	  		        	
	            // console.log(response);
	            // console.log('response.genre '+response.Genre);
	            $("input[name*='cat_name']").val(response.Genre);
	            $("input[name*='mov_title']").val(response.Title);
	            $("input[name*='mov_released']").val(response.Released);
	            $("input[name*='mov_language']").val(response.Language);
	            $("input[name*='mov_actors']").val(response.Actors);
	            $("textarea[name*='mov_synopsis']").val(response.Plot);
	            $("input[name*='mov_poster']").val(response.Poster);
	          })
	        .fail(function() {
	            console.log( "bad news... ERROR !" );
	        });
	});

// Ajout/update d'un film en base
//-------------------------------
	$("#crudForm").on( "submit", function( event ) {		
		event.preventDefault();
		movieInfos = $("#crudForm").serialize();
		// typeCRUD		
		// console.log(movieInfos);
	    $.ajax({
	        method: "POST",
	        url: "ajax/crud.php",
	        data: movieInfos,
	        dataType : 'json'
	        })
	        .done(function(response) {	  		        	
	            // console.log(response);
	            if (response.code != 0) {
	            // console.log('response.genre '+response.Genre);
	            	$("textarea").val("");
	            	$("input").val("");
	            } else {
	            	console.log(response.errorList);
	            }

	          })
	        .fail(function() {
	            console.log( "bad news... ERROR !" );
	        });
	});

// Reset FORM
//-------------------------------
	$("#resetButton").on( "reset", function( event ) {		
		event.preventDefault();
		$("textarea").val("");
		$("input").val("");	    
	});

});