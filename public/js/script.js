function confirmation(id){
  var conf = confirm("êtes vous sûr de vouloir supprimer ces données ?");
  if(conf == true){
    document.location.replace('index.php?action=supprimer&id=' + id);
  }
}


function modif(id){
  pseudoTab = document.getElementById('pseudo'+id);
  emailTab = document.getElementById('email'+id);
  passwordTab = document.getElementById('password'+id);

  let pseudo = pseudoTab.innerHTML;
  let email = emailTab.innerHTML;
  let password = passwordTab.innerHTML;

  pseudoTab.innerHTML = "<input required type='text' name='pseudo' value='" + pseudo +"'>";
  emailTab.innerHTML = "<input required type='text' name='email' value='" + email +"'>";
  passwordTab.innerHTML = "<input required type='text' name='password' value='" + password +"'>";

  document.getElementById('bouton'+id).innerHTML = "<input type='submit' class='btn btn-success' value='modifier'>";
  document.getElementById('formModif').action = "index.php?action=modifier&id="+id;     


  selectTab =  document.querySelectorAll('tr:not(#infos'+id+')');
  for(i=0;i<selectTab.length;i++){
    selectTab[i].addEventListener("click",undoUpdate);
  }

  buttons = document.querySelectorAll('.boutonModif:not(#bouton'+id+')');
  for(i=0;i<buttons.length;i++){
    idModif = buttons[i].value;
    buttons[i].onclick+= " undoUpdate()";
  }
}


function undoUpdate(){
  document.location.replace('index.php?action=gestion');
}


function showPassword(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var y = document.getElementById('visible');
  if (y.innerHTML === "afficher mot de passe") {
    y.innerHTML = "cacher mot de passe";
  } else {
    y.innerHTML = "afficher mot de passe";
  }
}

function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });