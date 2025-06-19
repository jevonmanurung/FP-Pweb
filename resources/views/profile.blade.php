@extends('layouts.sidebar')

@section('content')
<div class="container py-4">
  <div class="text-center mb-5">
    <h1 style="font-size: 36px; font-weight: bold;">Your Profile</h1>
    <p style="font-size: 20px; color: #777;">Manage your personal information and keep it updated</p>
  </div>

  <div class="row justify-content-center">
    <!-- Profile Picture Section -->
    <div class="col-md-4 text-center mb-5">
      <div class="profile-circle" style="width: 120px; height: 120px; margin: 0 auto; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center;">
        <img src="https://via.placeholder.com/100" alt="Profile Picture" class="img-fluid rounded-circle" />
      </div>
      <button class="btn btn-primary mt-4 px-5 py-2" style="font-size: 18px; border-radius: 25px; transition: background-color 0.3s;">Change Picture</button>
    </div>

    <!-- Profile Details Form -->
    <div class="col-md-6">
      <form>
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="form-label" style="font-size: 18px; font-weight: 600;">Full Name</label>
          <input type="text" class="form-control form-control-lg" id="name" placeholder="Enter your name" value={{ $user->name }} style="font-size: 16px; border-radius: 10px;">
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="form-label" style="font-size: 18px; font-weight: 600;">Email Address</label>
          <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" value={{ $user->email }} style="font-size: 16px; border-radius: 10px;">
        </div>

        <!-- Save Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-success px-5 py-2" style="font-size: 18px; border-radius: 25px; transition: background-color 0.3s;">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
