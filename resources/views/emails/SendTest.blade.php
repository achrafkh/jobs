@component('mail::message')

# Candidature Kpeiz

Bonjour {{ $data['firstname'] .' '. $data['lastname'] }},<br>

Nous avons bien reçu votre candidature pour le poste de développeur web chez Kpeiz.

Votre profil a retenu notre attention. A cet effet, nous vous proposons de passer ce test afin de mieux cerner vos compétences techniques.

Vous étes menés à crée une base de donnée  depuis  cet ensemble de données “https://www.kaggle.com/datasnaek/youtube/data”, et Générer un rapport présentant des graphiques et des analyses à partir de ces informations.
NB : Télécharger uniquement les fichiers  Gbcomments.csv, GBvideos.csv

Vous allez étre jugé sur votre conception et la qualité du rapport que vous allez présenter.

Une fois le challenge relevé , veuillez envoyer un fichier ZIP contenant les fichiers SQL et le code utilisé à cet e-mail.

Merci de vous référer à vos propres compétences. Nous sommes conscients qu’un développeur est en apprentissage continu. Votre raisonnement peut s’avérer plus important que le résultat en soi.

Vous êtes également invité à nous rejoindre pour une journée ouverte de recrutement au sein de nos locaux le samedi 19 Mai à partir de 9h
veuillez confirmer votre présence en répondant à cet email.

Merci,<br>
{{ config('app.name') }}
@endcomponent
