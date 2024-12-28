<div class=" common-card profile-card text-center flex flex-col justify-center gap-6">
    <div class="flex flex-col items-center gap-2">
        <div class="main-user-pic-70" style="background-image: url('/images/profile_new.svg');">
        </div>
        <h1>{{ $name }}</h1>
        <p>Member since {{ $year }}</p>
        <div class="pill-success capitalize">{{ $status }}</div>
    </div>
    <div class="flex justify-center">
        <a href="{{ route('profile.edit') }}"><button class="update-profile-btn ">Update Profile</button></a>
    </div>
</div>
{{-- Old Parent Class: common-card profile-card text-center flex flex-col md:flex-row gap-4 flex-wrap justify-center --}}
{{-- Old Profile Button Class: flex justify-center md:self-start --}}
