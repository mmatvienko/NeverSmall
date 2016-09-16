$(document).ready(function(){
	function move_div(){
		window_width=$(window).width();
		window_height=$(window).height();
		obj_width=$('.center').width();
		obj_height=$('.center').height();
	//	alert(window_width+' '+window_height);
		$('.center').css('top', (window_height/2) - (obj_height/2)).css('left', (window_width/2) - (obj_width/2));
		$('ul li a').css('width', (window_width/3.89));
		$('.table').css('margin-left', (0-(window_width/25.6))+'px');
		$('.table').css('margin-right',(0-(window_width/10.5))+'px');
	}

	move_div();

});

	
	$('#button').mousedown(function(){
		$('#button').css('background', '#801014');
	});

$('#button').mouseup(function(){
		$('#button').css('background', '#ae161a');
	});

	$('#button1').mousedown(function(){
		$('#button1').css('background', '#801014');
	});

$('#button1').mouseup(function(){
		$('#button1').css('background', '#ae161a');
	});
	$('#button2').mousedown(function(){
		$('#button2').css('background', '#801014');
	});

$('#button2').mouseup(function(){
		$('#button2').css('background', '#ae161a');
	});



$(document).ready(function(){
$('#pass').keyup(function(){
	if($('#pass').val()!=$('#repass').val()){
		$('#passgood').html('');
		$('#passbad').html('Password fields don\'t match!');
	}
	else if($('#pass').val()==$('#repass').val()){
		$('#passbad').html('');
		$('#passgood').html('Password fields do match!');
	}
});	

$('#repass').keyup(function(){
	
		if($('#pass').val()!=$('#repass').val()){
			$('#passgood').html('');
			$('#passbad').html('Password fields don\'t match!');
		}
		else if($('#pass').val()==$('#repass').val()){
			$('#passbad').html('');
			$('#passgood').html('Password fields do match!');
		}
	
	
		});	
});

$(document).ready(function(){

$(':input').keyup(function(){	

	if(($('input[name=first]').val()=="")||($('input[name=last]').val()=="")||($('input[name=weight]').val()=="")||($('input[name=user]').val()=="")||($('input[name=maxbench]').val()=="")||($('input[name=maxsquat]').val()=="")||($('input[name=password]').val()=="")||($('input[name=repassword]').val()=="")){
		$('#valsgood').html('');
		$('#valsbad').html('Please enter a value for all fields!');
	}
	else if(($('input[name=first]').val()!="")&&($('input[name=last]').val()!="")&&($('input[name=weight]').val()!="")&&($('input[name=height]').val()!="")&&($('input[name=user]').val()!="")&&($('input[name=maxbench]').val()!="")&&($('input[name=maxsquat]').val()!="")&&($('input[name=password]').val()!="")&&($('input[name=repassword]').val()!="")){
		$('#valsbad').html('');
		$('#valsgood').html('Your form is complete!');
	}
});	
});

$(document).ready(function(){
	$('#left').css('width',(window_width/4)+'px');
	$('#left').css('vertical-align','top');
	$('#right').css('width',(window_width/4)+'px');
	$('#middle').css('width',(window_width/2)+'px');
	$('#maint').css('width',window_width);
	$('#trright').css('width',((window_width/8))+'px');

});

$(document).ready(function(){
	$('input[name=search]').click(function(){
		$('input[name=search]').val("");
	});
});

$(document).ready(function(){
	$('#stopflow').css('width',(window_width/2)+'px');
});

$(document).ready(function(){
	function move_stop(){
		obj_width1=$('#stopflow').width();
		obj_height1=$('#stopflow').height();
		$('#stopflow').css('left', (window_width/2) - (obj_width1/2));
		$('#stopflow').css('top', window_height/5 );


	}
	move_stop();
});
