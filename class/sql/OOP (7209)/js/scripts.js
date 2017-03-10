$(document).ready(function(){
	
	$('#search_form').submit(
		function(){
			
			var query;
			query = $('#search_form input[name="q"]').val();
			
			loader_enable();
			
			$.get(
				"/ajax_form.php"
				, { q: query})
				.done(function( results )
				{
					loader_disable();
					
					$('#results').html(results);
				}
			);
			
			return false;
		}
	);
	
	var ajax_send = false;
	var field = $('#search_form input[name="q"]');
	field.keyup(
		function()
		{
			var query = field.val();
			
			if( ajax_send == false)
			{
				ajax_send = true;
				
				loader_enable();
				
				$.get(
					"/ajax_form.php"
					, { q: query})
					.done(function( results )
					{
						loader_disable();
						
						$('#results').html(results);
						ajax_send = false;
						
					}
				);
			}
			
		}
	);
	
	
	$('#regist_form').submit(function(){
		if( form_validate() )
		{
			//
		}
		else
		{
			return false;
		}
	});
	
	
	
});


var interval;
function loader_enable()
{
	$('#results').html('');
	
	$('#results').css({'font-size': '60px'});
	$( "#results" ).animate({
          opacity: '0.2'
        }, 5000, function() {
			$("#results").css({'opacity': '1'});
			$('#results').css({'font-size': '14px'});
	});
	
	var dots = '';
	interval = setInterval(function(){
		dots += '.';
		if(dots.length > 5)
		{
			dots = '';
		}
		$('#results').html(dots);
	}, 300);
}

function loader_disable()
{
	clearInterval(interval);
	$('#results').html('');
}

function form_validate()
{
	var errors = [];
	
	$('#regist_form .error').remove();
	
	// Проверяем обязательные поля для заполнения
	$('#regist_form input').each(function() {
		var input = $( this );
		
		if( input.data('required') )
		{
			if ( input.val().length == 0 )
			{
				errors.push('Required field');
				input.after('<span class="error">' + 'Required field' + '</span>');
			}
		}
		
		
	});
	
	var password1 = $('#regist_form input[name=password1]').val();
	var password2 = $('#regist_form input[name=password2]').val();
	
	if ( password1 != password2 )
	{
		errors.push('Passwwords dif.');
		$('#regist_form input[name=password2]').after('<span class="error">' + 'Password dif.' + '</span>');
	}
	
	var phone = $('#regist_form input[name=phone]').val();
	
	if( ! /^[-\d ]*$/.test(phone) )
	{
		errors.push('Phone not valid');
		$('#regist_form input[name=phone]').after('<span class="error">' + 'Phone not valid' + '</span>');
	}
	
	if( errors.length > 0 )
	{
	//	alert( errors.join("\n") );
		return false;
	}
	else
	{
		return true;
	}
}


