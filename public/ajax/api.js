$(document).ready(function() {
	loadMovies();
});


// Fonction permettant de charger tous les salons de discussion
function loadMovies() {
	$.ajax({
		method: 'GET',
		url: 'http://wf3.progweb.fr/chat-api/room/get/',
		dataType: 'json',
		data: {},
		success: function(response) {
			console.log(response);

			// Je teste un ajout d'option dans mon select de Rooms
			$('#form-room').find('select').append('<option value="5">TOTO</option>');

			// Je réinitialise les options
			$('#form-room').find('select').html('<option value="0">choose</option>');

			// Je parcours le tableau reçu dans "response"
			$.each(response, function(key, value) {
				// Pour chaque élément du tableau, j'ajoute une balise "option" dans la balise "select"
				$('#form-room').find('select').append('<option value="'+value.id+'">'+value.roomName+'</option>');
			});
		}
	});
}
