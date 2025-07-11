<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>First Name:</label>
    <input type="text" name="first_name" value="{{ $profile->first_name }}"><br>
    <label>Last Name:</label>
    <input type="text" name="last_name" value="{{ $profile->last_name }}"><br>
    <label>Upload Resume:</label>
    <input type="file" name="resume"><br>
    <button type="submit">Update Profile</button>
</form>
