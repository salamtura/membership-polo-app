<div class="common-card profile-card text-center flex flex-col md:flex-row gap-4">
    <div class="flex flex-col items-center gap-2">
        <div class="main-user-pic-70" style="background-image: url({{ $image }});">
        </div>
        <h1>{{ $name }}</h1>
        <p>Member since {{ $year }}</p>
        <div class="pill-success capitalize">{{ $status }}</div>
    </div>
    <div class="flex justify-center md:self-start">
        <button class="update-profile-btn ">Update Profile</button>
    </div>
</div>
