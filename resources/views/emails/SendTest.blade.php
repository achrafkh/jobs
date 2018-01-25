@component('mail::message')

# Candidature Kpeiz

Bonjour {{ $data['firstname'] .' '. $data['lastname'] }},<br>
J'ai reçu votre candidature pour le poste de web developer et nous sommes intéressés par votre candidature.
Vous êtes shortlisté pour passer un test technique qui dure 30mn.

@component('mail::button', ['url' => 'https://goo.gl/forms/pjuNylFVrZ4yEEp43'])
Commencer le test
@endcomponent

On vous demande pas de répondre a toutes les questions, on comprends qu'un développeur web est en formation continue et qu'il peut s'améliorer merci de ne pas tricher ça va vous faire perdre votre temps et le notre.

Merci,<br>
{{ config('app.name') }}
@endcomponent
