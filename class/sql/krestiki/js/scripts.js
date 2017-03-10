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
				user: getParameterByName('user')
			}
			})
			.done(function( json ) {
				
				$('#step_result').html(json.status);
				
				if(json.status == 'ok')
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
		});
		
	setInterval(function(){
		$.ajax({
			url: "/step.php",
			dataType: "json",
			data: {
				user: getParameterByName('user')
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
	}, 2000);
	
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
