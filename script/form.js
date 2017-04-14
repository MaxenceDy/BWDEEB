window.onload = function() {
	document.getElementById("gest-perso").classList.add("Hide");
	//document.getElementById("experience").classList.add("Hide");
	//document.getElementById("loisirs").classList.add("Hide");
	
	document.getElementById("bt_avatar").addEventListener("click", ShowAvatar);
	document.getElementById("bt_info").addEventListener("click", ShowInfo);
	//document.getElementById("bt_exp").addEventListener("click", ShowExp);
	//document.getElementById("bt_L").addEventListener("click", ShowLoisirs);
	
	
};

function ShowAvatar(e){
		e.preventDefault();
		document.getElementById("gest-avatar").classList.remove("Hide");
		
		document.getElementById("gest-perso").classList.add("Hide");
		//document.getElementById("experience").classList.add("Hide");
		//document.getElementById("loisirs").classList.add("Hide");
	}
	
	function ShowInfo(e){
		e.preventDefault();
		document.getElementById("gest-perso").classList.remove("Hide");
		
		document.getElementById("gest-avatar").classList.add("Hide");
		//document.getElementById("experience").classList.add("Hide");
		//document.getElementById("loisirs").classList.add("Hide");
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