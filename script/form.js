window.onload = function() {
	// au chargement de la page seul Avatar est afficher par défaut
	document.getElementById("gest-perso").classList.add("Hide");
	
	// ajout des EventListener
	document.getElementById("bt_avatar").addEventListener("click", ShowAvatar);
	document.getElementById("bt_info").addEventListener("click", ShowInfo);
	
};


// cache la partie INFO pour laisser place à la partie Avatar
function ShowAvatar(e){
	e.preventDefault();
	document.getElementById("gest-avatar").classList.remove("Hide");
	
	document.getElementById("gest-perso").classList.add("Hide");
}
	
// cache la partie Avatar pour laisser place à la partie INFO
function ShowInfo(e){
	e.preventDefault();
	document.getElementById("gest-perso").classList.remove("Hide");
	
	document.getElementById("gest-avatar").classList.add("Hide");
}