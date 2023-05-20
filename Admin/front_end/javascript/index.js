function showConfirmation(idquestionSelect) //pop-up système
{
if (confirm("Êtes-vous sûr de vouloir supprimer la question?"))  // L'admin clique sur ok
  {
    window.location.href = "../back_end/supprimerQuestions.php?id=" + idquestionSelect; // Le pop up systeme redirige l'admin avec l'idquestion qu'il a selectionné via l'url (window.location)
  }
}

function hidePassword() //Afficher mdp
{
    var voirMDP = document.getElementById('mdp_admin');
    if (voirMDP.type === 'password') 
    {
      voirMDP.type = 'text';
    } 
    else 
    {
      voirMDP.type = 'password';
    }
  }