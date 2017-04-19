window.onload = function() {
	// au chargement de la page seul Avatar est afficher par défaut
	document.getElementById("gest-perso").classList.add("Hide");
	
	if(document.getElementById("gest-boutique")!=null){
		document.getElementById("gest-boutique").classList.add("Hide");
		document.getElementById("bt_boutique").addEventListener("click", ShowBoutique);
		
		document.getElementById("gest_droit").classList.add("Hide");
		document.getElementById("bt_gestion_droit").addEventListener("click", ShowGestDroit);
		
		document.getElementById("gest-actis").classList.add("Hide");
		document.getElementById("bt_gestion_activites").addEventListener("click", ShowActis);
	}
	
	
	// ajout des EventListener
	document.getElementById("bt_avatar").addEventListener("click", ShowAvatar);
	document.getElementById("bt_info").addEventListener("click", ShowInfo);
	
};


// cache la partie INFO pour laisser place à la partie Avatar
function ShowAvatar(e){
	e.preventDefault();
	document.getElementById("gest-avatar").classList.remove("Hide");
	
	document.getElementById("gest-perso").classList.add("Hide");
	
	if(document.getElementById("gest-boutique")!=null){
		document.getElementById("gest-boutique").classList.add("Hide");
		document.getElementById("gest_droit").classList.add("Hide");
		document.getElementById("gest-actis").classList.add("Hide");
	}
	
	
}
	
// cache la partie Avatar pour laisser place à la partie INFO
function ShowInfo(e){
	e.preventDefault();
	document.getElementById("gest-perso").classList.remove("Hide");
	
	document.getElementById("gest-avatar").classList.add("Hide");
	
	if(document.getElementById("gest-boutique")!=null){
		document.getElementById("gest-boutique").classList.add("Hide");
		document.getElementById("gest_droit").classList.add("Hide");
		document.getElementById("gest-actis").classList.add("Hide");
	}
	
}

// cache la partie Avatar pour laisser place à la partie INFO
function ShowBoutique(e){
	e.preventDefault();
	document.getElementById("gest-boutique").classList.remove("Hide");
	
	document.getElementById("gest-avatar").classList.add("Hide");
	document.getElementById("gest-perso").classList.add("Hide");
	document.getElementById("gest_droit").classList.add("Hide");
	document.getElementById("gest-actis").classList.add("Hide");
}

// cache la partie Avatar pour laisser place à la partie INFO
function ShowGestDroit(e){
	e.preventDefault();
	document.getElementById("gest_droit").classList.remove("Hide");
	
	document.getElementById("gest-avatar").classList.add("Hide");
	document.getElementById("gest-perso").classList.add("Hide");
	document.getElementById("gest-boutique").classList.add("Hide");
	document.getElementById("gest-actis").classList.add("Hide");
}

// cache la partie Avatar pour laisser place à la partie INFO
function ShowActis(e){
	e.preventDefault();
	document.getElementById("gest-actis").classList.remove("Hide");
	
	document.getElementById("gest-avatar").classList.add("Hide");
	document.getElementById("gest-perso").classList.add("Hide");
	document.getElementById("gest-boutique").classList.add("Hide");
	document.getElementById("gest_droit").classList.add("Hide");
}