<!DOCTYPE html>
<html>
<head>
    <title>Guards Polo Club Enrollment Form</title>
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('wizard.css') }}" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto" src="/club_logo_2.png" alt="" width="94" height="135">
        <h2>Enrollment form</h2>
        <p class="lead">Welcome to the club membership enrollment form. This enrollment for is to revalidate membership details of our esteemed members and new members.</p>
    </div>


    <div class="row">
        <livewire:wizard />
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; {{today()->year}} Guards Polo Club</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

</body>

@livewireScripts

</html>
