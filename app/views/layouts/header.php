<nav class="white z-depth-0 h-[150px] px-[200px]">
    <div class="flex items-center justify-between">
        <p class="text-black">Hello <?php echo $_SESSION['username'] ?> , Have a good day</p>
            <ul id="nav-mobile">
                <li><a href="<?php echo site_url('/auth/logout'); ?>" class="btn brand z-depth-0">Logout</a></li>
            </ul>
    </div>
      
    <div class="flex items-center justify-between">
        <a href="<?php echo site_url('/student/index'); ?>" class="text-4xl brand-text">UIT Student</a>
        <ul id="" class="">
            <li><a href="<?php echo site_url('/student/create'); ?>" id="addBtn" class="<?php echo isAdmin() ? "btn brand z-depth-0" : ""?>"><?php echo isAdmin() ? "Add student" : ""?></a></li>
        </ul>
    </div>
</nav>