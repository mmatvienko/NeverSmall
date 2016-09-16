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
	$('#button1').mouseup(function(){
	var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1; //Months are zero based
    var curr_year = d.getFullYear();
	document.getElementById('notes').value += '\n'+(curr_month + "/" + curr_date + "/" + curr_year)+'\n';

	});
});
