$('#agendabundle_evenement_intervenants, #destination_obs').listswap({
  // true = disable word wrap
  truncate : false,
  // custom height
  height : 200,
  // show scroll
  is_scroll : true,
  // text for add label
  label_add : 'Add',
  // text for remove label
  label_remove : 'Remove',
  // addional CSS class
  add_class : null,
  // enable rtl support
  rtl : false
});

$('#agendabundle_evenement_observateurs, #destination_interv').listswap({
  // true = disable word wrap
  truncate : false,
  // custom height
  height : 200,
  // show scroll
  is_scroll : true,
  // text for add label
  label_add : 'Add',
  // text for remove label
  label_remove : 'Remove',
  // addional CSS class
  add_class : null,
  // enable rtl support
  rtl : false
});

window.onload = function () {
    if (elem!=0){
      document.getElementById("liste_participants").style.display='block';
    }
    else{
      document.getElementById("liste_participants").style.display='none';
    }
    if (elem!=0){
      document.getElementById("liste_observateurs").style.display='block';
    }
    else{
      document.getElementById("liste_observateurs").style.display='none';
    }

  document.getElementById("valider").addEventListener("click",function(event){
    event.preventDefault();
    var hDebut = document.getElementById("agendabundle_evenement_heureDebut_hour").value;
    var hFin = document.getElementById("agendabundle_evenement_heureFin_hour").value;
    var mDebut = document.getElementById("agendabundle_evenement_heureDebut_minute").value;
    var mFin = document.getElementById("agendabundle_evenement_heureFin_minute").value;
    if (hDebut>hFin){
      document.getElementById("alert_heure").innerHTML="L'heure de début et de fin ne correspondent pas";
    }
    else if(hDebut==hFin && mDebut>hFin){
      document.getElementById("alert_heure").innerHTML="L'heure de début et de fin ne correspondent pas";
    }
    else{
      document.getElementsByName("agendabundle_evenement")[0].submit();
    }
  })
}

function verif_participants(elem){
  if (elem!=0){
    document.getElementById("liste_participants").style.display='block';
  }
  else{
    document.getElementById("liste_participants").style.display='none';
  }
}
function verif_observateurs(elem){
  if (elem!=0){
    document.getElementById("liste_observateurs").style.display='block';
  }         else{
    document.getElementById("liste_observateurs").style.display='none';
  }
}
