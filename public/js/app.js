function slidemenu(){
    document.getElementById("menu_vetical-container").style.transform="translateX(0px)";
    document.getElementById("menu_vetical-container").style.opacity = "1";
    document.getElementById("menu_vetical-container").style.visibility = "visible";
}

function closemenu(){
    document.getElementById("menu_vetical-container").style.transform="translateX(-15px)";
    document.getElementById("menu_vetical-container").style.opacity = "0";
    document.getElementById("menu_vetical-container").style.visibility = "hidden";
}

function visiblemdplogin(){

    if(document.getElementById("Password").type =="password"){
        document.getElementById("Password").type="text";
        document.getElementById("passwordNotVisble").innerHTML = "visibility";
        
    }
    else{
        document.getElementById("passwordNotVisble").innerHTML = "visibility_off";
        document.getElementById("Password").type="password";
    }

    
}

function clearmodaladmin(){
    document.getElementById("add-user").style.display = 'none';
    document.getElementById("edit-user").style.display = 'none';
    document.getElementById("accept-new-user").style.display = 'none';
    document.getElementById('ignore-new-user').style.display ="none";
    document.getElementById('add_cours').style.display ="none";
    document.getElementById("edit_cours").style.display = 'none'
}
function setupmodal(){
    document.getElementById("modal_background-container").style.display = 'flex';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function clearmodalgestionnaire(){
    document.getElementById("add_etudiant").style.display = 'none';
    document.getElementById("edit_etudiant").style.display = 'none';
    
    document.getElementById("edit_seance").style.display = 'none';

}
function listgrid(){
    if (document.getElementById('list-grid').classList.contains('fa-list')) {
        document.getElementById('list-grid').classList.remove('fa-list');
        document.getElementById('list-grid').classList.add('fa-grip');
    }else{
        document.getElementById('list-grid').classList.remove('fa-grip');
        document.getElementById('list-grid').classList.add('fa-list');
    }
    var boxes = document.querySelectorAll('.container2');
    var boxes2 = document.querySelectorAll('.container');

    if(document.querySelector('.container').style.display == 'none'){
        boxes2.forEach(box => {
            // ✅ Remove class from each element
            box.style.display = 'flex';     
               
               
                
                // ✅ Add class to each element
                // box.classList.add('small');
            });
        boxes.forEach(box => {
            // ✅ Remove class from each element
               
                box.style.display = 'none';     
                
                // ✅ Add class to each element
                // box.classList.add('small');
        });
    }else{
        boxes2.forEach(box => {
            // ✅ Remove class from each element
            box.style.display = 'none';     
               
               
                
                // ✅ Add class to each element
                // box.classList.add('small');
            });
        boxes.forEach(box => {
            // ✅ Remove class from each element
               
                box.style.display = 'flex';     
                
                // ✅ Add class to each element
                // box.classList.add('small');
        });
   
    }
    var test = document.getElementById('container-user');
    test.classList.toggle('wrapper2');
    
}  
    
function openAddUser(){
    clearmodaladmin();
    setupmodal();
    document.getElementById("add-user").style.display = 'block';

}

function closemodal(){
    document.getElementById("modal_background-container").style.display = 'none';
   
}

function openEditUser(id,nom,prenom,login,role){
    clearmodaladmin();
    setupmodal();
    document.getElementById('Newnom').value = nom;
    document.getElementById('Newprenom').value = prenom;
    document.getElementById('Newlogin').value = login;
    document.getElementById(role).selected = true;
    document.getElementById('FormEditUser').action ="/admin/collections/utilisateur/edit/"+id;
    document.getElementById("edit-user").style.display = 'block';
  
}


function openRecentUser(count){
    if(count>0){
        document.getElementById("notif").style.display = 'flex';
    }
}


document.addEventListener('click', function(event) {
    var ignoreClickOnMeElement = document.getElementById('notif');
    var ignoreClickOnMeElement1 =document.getElementById('bell');
    var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    var isClickInsideElement1 = ignoreClickOnMeElement1.contains(event.target);
    if (!isClickInsideElement && !isClickInsideElement1 ) {
//         //Do something click is outside specified element
        document.getElementById("notif").style.display = "none";
    }
});


function acceptNewUser(id,nom,prenom){
    clearmodaladmin();
    setupmodal();
    document.getElementById('Form-accept-new-user').action ="/admin/collections/utilisateur/accept/"+id;
    document.getElementById('accept-new-user').style.display ="block";
    document.getElementById('accept-new-user-title').innerHTML = "Choisisser un role pour "+nom+" "+prenom;
}


function ignoreNewUser(id,nom,prenom){
    clearmodaladmin();
    setupmodal();
    document.getElementById('Form-ignore-new-user').action ="/admin/collections/utilisateur/delete/"+id;
    document.getElementById('ignore-new-user').style.display ="block";
    document.getElementById('ignore-new-user-title').innerHTML = "Ignorer "+ nom +" "+prenom+" ?";
}


function openAddCours(){
    clearmodaladmin();
    setupmodal();
    document.getElementById('add_cours').style.display ="block";
}

function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('seach_bar');
    filter = input.value.toUpperCase();
    ul = document.getElementById("container-cours");
    li = ul.getElementsByClassName('container');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("p")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
}


function openEditCours(id,nom) {
    clearmodaladmin();
    setupmodal();
    document.getElementById('Newintitule').value = nom; 
    document.getElementById('edit-cours-title').innerHTML = "Modifier le cours de "+nom;
    document.getElementById('Form-edit-cours').action ="/admin/collections/cours/edit/"+id;
    document.getElementById("edit_cours").style.display = 'block';
}

// GESTIONNAIRE

function openAddEtudiant(){
    clearmodalgestionnaire();
    setupmodal();
    document.getElementById("modal_background-container").style.display = 'flex';
    document.getElementById("add_etudiant").style.display = 'block';
}



function openEditEtudiant(id,nom,prenom,noet){
    clearmodalgestionnaire();
    setupmodal();
    document.getElementById('Newnom').value = nom;
    document.getElementById('Newprenom').value = prenom;
    document.getElementById('NewNumeroEtudiant').value = noet;  
    document.getElementById('FormEditEtudiant').action ="/gestionnaire/collections/etudiant/edit/"+id;
    document.getElementById("edit_etudiant").style.display = 'block';
}

function openAddSeance(){
    clearmodalgestionnaire();
    setupmodal();
    document.getElementById("addSeance").style.display = 'block';
}


function openEditSeance(id,sid) {
    clearmodalgestionnaire()
    setupmodal()
    document.getElementById('FormEditSeance').action ="/gestionnaire/collections/cours/"+id+"/seances/edit/"+sid;
    document.getElementById("addSeance").style.display = 'none';
    document.getElementById("edit_seance").style.display = 'block';
 
}


function public (){
  
    var test = document.querySelector('.dateButton').value;
    var seances = document.querySelectorAll('[name="'+test+'"]');
    document.querySelectorAll('.container').forEach(box =>{
        box.style.display = 'none';  
    })
    seances.forEach(box => {
        // ✅ Remove class from each element
        box.style.display = 'flex';     
           
           
            
            // ✅ Add class to each element
            // box.classList.add('small');
    });
    
};



function TEST(id){
 
    var seances = document.querySelectorAll('[name="'+id+'"]');
    document.querySelectorAll('.container').forEach(box =>{
        box.style.display = 'none';  
    })
    seances.forEach(box => {
        // ✅ Remove class from each element
        box.style.display = 'flex';     
           
            // ✅ Add class to each element
            // box.classList.add('small');
    });
}



function associate(){
    if( document.querySelectorAll('input[name="associationEnseignant[]"]:checked').length>0){
        document.getElementById("associerEnseignant").style.visibility = 'visible';
    }else{
        document.getElementById("associerEnseignant").style.visibility = 'hidden';
    }

   
}

function associateEtudiant(){
    if( document.querySelectorAll('input[name="associationEtudiant[]"]:checked').length>0){
        document.getElementById("associationEtudiant").style.visibility = 'visible';
    }else{
        document.getElementById("associationEtudiant").style.visibility = 'hidden';
    }
}

function dissociate(){
    if( document.querySelectorAll('input[name="dissociationEnseignant[]"]:checked').length>0){
        document.getElementById("dissocierEnseignant").style.visibility = 'visible';
    }else{
        document.getElementById("dissocierEnseignant").style.visibility = 'hidden';
    }
}

function dissociateEtudiant(){
    if( document.querySelectorAll('input[name="dissociationEtudiant[]"]:checked').length>0){
        document.getElementById("dissocierEtudiant").style.visibility = 'visible';
    }else{
        document.getElementById("dissocierEtudiant").style.visibility = 'hidden';
    }
}


function AddOnloadEvent(f) {
    if(typeof window.onload != 'function') { window.onload = f; }
    else {
       var cache = window.onload;
       window.onload = function() {
          if(cache) { cache(); }
          f();
          };
       }
    }
AddOnloadEvent(public);


function pointage(){
    if( document.querySelectorAll('input[name="pointage[]"]:checked').length>0){
        document.getElementById("pointer").style.visibility = 'visible';
    }else{
        document.getElementById("pointer").style.visibility = 'hidden';
    }
}

function depointage(){
    if( document.querySelectorAll('input[name="depointage[]"]:checked').length>0){
        document.getElementById("depointer").style.visibility = 'visible';
    }else{
        document.getElementById("depointer").style.visibility = 'hidden';
    }

}