<form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
    @csrf
    <label>First Name:</label>
    <input type="text" name="first_name" required><br>
    <label>Last Name:</label>
    <input type="text" name="last_name" required><br>
    <label>Upload Resume:</label>
    <input type="file" name="resume"><br>
    <button type="submit">Save Profile</button>
</form>
