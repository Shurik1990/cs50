$(document).ready(function(){
	
	// Поиск. AJAX
	$('#search_form').submit(
		function(){
			
			var query;
			query = $('#search_form input[name="q"]').val(); // получаем текст из поля
			
			loader_enable(); // включаем loader
			
			// Отправка запроса на сервер
			$.get(
				"/ajax_form.php" // адрес скрипта на сервере
				, { q: query} ) // передаваемые данные
				.done(function( results ) // callback-функция
				{
					loader_disable(); // отключаем loader
					
					$('#results').html(results); // вставляем результат
				}
			);
			
			return false; // отменяем submit формы
		}
	);
	
	// Подгрузка результатов поиска ещё при вводе
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
	
	
	// Форма регистрации. Валидация
	$('#regist_form').submit(function(){
		if( form_validate() ) // проверяем поля формы
		{
			//
		}
		else
		{
			return false; // отменяем submit формы, если есть ошибки
		}
	});
	
	
	
});


var interval;
// Включает loader
function loader_enable()
{
	$('#results').html(''); // удаляем старый текст
	
	// Пример анимации
	$('#results').css({'font-size': '60px'});
	$( "#results" ).animate({
          opacity: '0.2'
        }, 5000, function() {
			$("#results").css({'opacity': '1'});
			$('#results').css({'font-size': '14px'});
	});
	
	var dots = ''; // строка-loader (точки)
	interval = setInterval(function(){
		dots += '.'; // прибавляем ещё одну точку
		if(dots.length > 5)
		{
			dots = ''; // сбрасываем количество точек
		}
		$('#results').html(dots); // вставляем текст loader-а (точки) в нужный блок
	}, 300);
}

// Отключает loader
function loader_disable()
{
	clearInterval(interval); // Отменяем повторения
	$('#results').html(''); // Очищаем тест - удаляем оттуда точки
}

// Проверка формы
function form_validate()
{
	var errors = []; // массив с ошибками
	
	$('#regist_form .error').remove(); // удаляем все старые сообщения об ошибках
	
	// Проверяем обязательные поля для заполнения
	$('#regist_form input').each(function() { // цикл по всем полям формы
		var input = $( this );
		
		// Если поле обязательное, то оно должно быть заполнено
		if( input.data('required') )
		{
			if ( input.val().length == 0 )
			{
				errors.push('Required field'); // добавляем сообщение в массив с ошибками
				input.after('<span class="error">' + 'Required field' + '</span>'); // вставляем сообщение с ошибкой под текущее поле
			}
		}
		
		
	});
	
	// Проверяем, что пароли совпадают
	var password1 = $('#regist_form input[name=password1]').val();
	var password2 = $('#regist_form input[name=password2]').val();
	
	if ( password1 != password2 )
	{
		errors.push('Passwwords dif.');
		$('#regist_form input[name=password2]').after('<span class="error">' + 'Password dif.' + '</span>');
	}
	
	// Проверяем телефон
	var phone = $('#regist_form input[name=phone]').val();
	
	// Текст должен содержать только цифры, чёрточки и пробелы
	if( ! /^[-\d ]*$/.test(phone) )
	{
		errors.push('Phone not valid');
		$('#regist_form input[name=phone]').after('<span class="error">' + 'Phone not valid' + '</span>');
	}
	
	// Если в итоге есть ошибки
	if( errors.length > 0 )
	{
	//	alert( errors.join("\n") );
		return false; // отменяем submit формы
	}
	else
	{
		return true;
	}
}