window.onload = function() {
	document.getElementById("gest-perso").classList.add("Hide");
	//document.getElementById("experience").classList.add("Hide");
	//document.getElementById("loisirs").classList.add("Hide");
	
	document.getElementById("bt_comp").addEventListener("click", ShowComp);
	document.getElementById("bt_form").addEventListener("click", ShowForm);
	//document.getElementById("bt_exp").addEventListener("click", ShowExp);
	//document.getElementById("bt_L").addEventListener("click", ShowLoisirs);
	
	
};

function ShowAvatar(e){
		e.preventDefault();
		document.getElementById("competence").classList.remove("Hide");
		
		document.getElementById("formation").classList.add("Hide");
		document.getElementById("experience").classList.add("Hide");
		document.getElementById("loisirs").classList.add("Hide");
	}
	
	function ShowInfo(e){
		e.preventDefault();
		document.getElementById("formation").classList.remove("Hide");
		
		document.getElementById("competence").classList.add("Hide");
		document.getElementById("experience").classList.add("Hide");
		document.getElementById("loisirs").classList.add("Hide");
	}
	
	/*
	function ShowExp(e){
		e.preventDefault();
		document.getElementById("experience").classList.remove("Hide");
		
		document.getElementById("competence").classList.add("Hide");
		document.getElementById("formation").classList.add("Hide");
		document.getElementById("loisirs").classList.add("Hide");
	}
	
	function ShowLoisirs(e){
		e.preventDefault();
		document.getElementById("loisirs").classList.remove("Hide");
		
		document.getElementById("competence").classList.add("Hide");
		document.getElementById("experience").classList.add("Hide");
		document.getElementById("formation").classList.add("Hide");
	}
	*/