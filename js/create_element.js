$(document).ready(function(){
	var hi = 0;
	obj_width=$('#stopflow').width();
	var margin = 0;



	$('#button').mouseup(function(){
		$( '<tr><td id="label">Exercise </td><td><input type="text" name="exercise'+ hi +'"></td></tr>' ).appendTo( "#table_to_add" );
		$( '<tr><td id="label">Sets</td><td><input type="text" name="set'+ hi +'"></td ></tr>' ).appendTo( "#table_to_add" );
		++hi;		
		window_width=$(window).width();
		window_height=$(window).height();
		obj_width1=$('#stopflow').width();
		obj_height1=$('#stopflow').height();
		//$('#stopflow').css('left', (window_width/2) - (obj_width1/2));
		//$('#stopflow').css('top', window_height/5 );

	});
});
$(document).ready(function(){
		window_width=$(window).width();
		window_height=$(window).height();
		$('#notes').css('height',window_height-(window_height/3));
		$('#notes').css('width',window_width/2);
});
$(document).ready(function(){
	$('#button1').mouseup(function(){
	var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1; //Months are zero based
    var curr_year = d.getFullYear();
	document.getElementById('notes').value += '\n'+(curr_month + "/" + curr_date + "/" + curr_year)+'\n';

	});

});

