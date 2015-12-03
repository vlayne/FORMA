<html>

<head><title>titre</title></head>

<body>
<form method='post' action="index.php?uc=inscription">
<p>Identifiant</p>
<input type='text' name='ID'/>
<p>Mot de pass</p>
<input type='text' name='mdp'/>
<p>Confirmation Mot de pass</p>
<input type='text' name='mdpV'/>
<p>Nom Association</p>
<input type='text' name='nomA'/>
<p>Nom</p>
<input type='text' name='nom'/>
<p>Prenom</p>
<input type='text' name='prenom'/>
<p>Numero ICOM</p>
<input type='text' name='icom'/>
<p>Date de Naissance</p>
<input type='text' name='ddn'/>
<p>Adresse e-mail</p>
<input type='text' name='email'/>
<p>Adresse</p>
<input type='text' name='adresse'/>
<p>Telephone</p>
<input type='text' name='telephone'/>
<p>Fonction</p>
<input type='text' name='fonction'/>

<label> Payement </label>

<p> 
Si vous cochez "ulterieur" , vous devrez envoyer un chèque auprès 
d'Uniformation afin de valider votre inscription.
</p>

immediat <br/>
<input type='radio' name='payement' value='oui' />
<br/>ulterieur 
<input type='radio' name='payement' value='non' />
<br/>
<input type='submit' value='Valider'/>
<input type='button' value='Annuler'/>
</form>

</body>

</html>