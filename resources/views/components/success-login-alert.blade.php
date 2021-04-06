<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    !! Hello {{ $userName }}, Welcome to our rage ...
    Do You want to upload your profile pic 
    <form action = "/api/upload-profile-pic" method = "POST">
        <input type = "file" name = "profile" class = "profile" />, and Click Here<input type = "submit" value = "submit" />
    </form>
</div>