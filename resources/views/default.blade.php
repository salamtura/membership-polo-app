<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guards Polo Club Enrollment Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('wizard.css') }}" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class="container">
    <div class="text-center">
        <img class="d-block mx-auto" src="{{ asset('images/club_logo_2.png') }}" alt="" width="94" height="135">
        <h2>Enrollment Form</h2>
        <p class="lead">Welcome to the club membership enrollment form. This enrollment is to revalidate membership details of our esteemed members and new members.</p>
    </div>

    <livewire:wizard />

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; {{today()->year}} Guards Polo Club</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="http://abujaguardspolo.com">Privacy</a></li>
            <li class="list-inline-item"><a href="http://abujaguardspolo.com">Terms</a></li>
            <li class="list-inline-item"><a href="http://abujaguardspolo.com">Support</a></li>
        </ul>
    </footer>
</div>

</body>

@livewireScripts

</html>
