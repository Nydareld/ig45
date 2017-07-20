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
