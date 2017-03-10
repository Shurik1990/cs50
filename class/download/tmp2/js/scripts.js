$(document).ready(function(){
	
	$('#game_body .cell').click(function(){
		var row = $(this).data('row');
		var cell = $(this).data('cell');
		var cell = $(this).data('cell');
		
		$.ajax({
			url: "/step.php",
			dataType: "json",
			data: {
				row: row,
				cell: cell,
				user: getParameterByName('user'),
				game_id: getParameterByName('game_id')
			}
			})
			.done(function( json ) {
				
				//$('#step_result').html(json.status);
				
				if(json.status == 'ok' || json.status == 'winner')
				{
					$('#game_body .cell').each(function(){
						
						var row = $(this).data('row');
						var cell = $(this).data('cell');
						
						if( json.area[row][cell] == 1)
						{
							$(this).addClass('user1').removeClass('free');
						}
						else if( json.area[row][cell] == 2)
						{
							$(this).addClass('user2').removeClass('free');
						}
							$(this).html(json.area[row][cell]);
						
					});
				}
				else
				{
					$('#step_result').html(json.message);
				}
				
			});
		});
		
	setInterval(function(){
		$.ajax({
			url: "/step.php",
			dataType: "json",
			data: {
				user: getParameterByName('user'),
				game_id: getParameterByName('game_id')
			}
			})
			.done(function( json ) {
				
				if(json.area)
				{
					$('#game_body .cell').each(function(){
						
						var row = $(this).data('row');
						var cell = $(this).data('cell');
						
						if( json.area[row][cell] == 1)
						{
							$(this).addClass('user1').removeClass('free');
						}
						else if( json.area[row][cell] == 2)
						{
							$(this).addClass('user2').removeClass('free');
						}
							$(this).html(json.area[row][cell]);
						
					});
				}
				
			});
	}, 3000);
	
});



function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
