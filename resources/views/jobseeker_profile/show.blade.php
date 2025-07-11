<h2>Jobseeker Profile</h2>
<p>Name: {{ $profile->first_name }} {{ $profile->last_name }}</p>
<p>School: {{ $profile->school_name }}</p>
<p>Course: {{ $profile->course }}</p>
<p>Skills: {{ $profile->skills }}</p>
@if ($profile->resume_path)
    <p><a href="{{ asset('storage/' . $profile->resume_path) }}" target="_blank">View Resume</a></p>
@endif
