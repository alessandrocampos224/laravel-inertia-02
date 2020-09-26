<template>
  <li class="dropdown dropdown-user nav-item">
    <a
      class="dropdown-toggle nav-link dropdown-user-link"
      href="#"
      data-toggle="dropdown"
    >
      <div class="user-nav d-sm-flex d-none">
        <span class="user-name text-bold-600">John Doe</span
        ><span class="user-status">Available</span>
      </div>
      <span
        ><img
          class="round"
          src="/_dist/admin/images/portrait/small/avatar-s-11.jpg"
          alt="avatar"
          height="40"
          width="40"
      /></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="page-user-profile.html"
        ><i class="feather icon-user"></i> Edit Profile</a
      ><a class="dropdown-item" href="app-email.html"
        ><i class="feather icon-mail"></i> My Inbox</a
      ><a class="dropdown-item" href="app-todo.html"
        ><i class="feather icon-check-square"></i> Task</a
      ><a class="dropdown-item" href="app-chat.html"
        ><i class="feather icon-message-square"></i> Chats</a
      >
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="auth-login.html"
        ><i class="feather icon-power"></i> Logout</a
      >
    </div>
  </li>
</template>

<script>
export default {};
</script>

<style>
</style>