<div class="profile clearfix">
    <div class="profile_pic">
      <img src="{{ asset('v1/production/images/user.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>