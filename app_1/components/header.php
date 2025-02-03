<header id="Header">
    <button id="ToggleListButton">
        <i class="fa-regular fa-bars-staggered"></i>
    </button>

    <!-- profile -->
    <div class="profile">
        <div class="shape">
            <i class="fa-duotone fa-user"></i>
        </div>
        <div class="info">
            <div class="state">
                <i class="fa-duotone fa-circle"></i>
                <span>online</span>
            </div>
            <div class="user-name">
                <p><?php echo $_SESSION['user_name'];  ?></p>
            </div>
        </div>
        <div>
            <i class="fa-solid fa-angle-down"></i>
        </div>
        <?php if ($_SESSION['user_access'] == 'admin') : ?>
            <div class="profileList">
                <div class="list_item" onclick="window.location.assign('/usersprofiles')">
                    <i class="fa-duotone fa-users"></i>
                    <span>Users</span>
                </div>
                <div class="list_item" id="logout2" onclick="logout()">
                    <i class="fa-duotone fa-right-from-bracket"></i>
                    <span>Logout</span>
                </div>
            </div>
        <?php endif; ?>

    </div>
</header>



<script>
    const ToggleListButton = GetElement('#ToggleListButton')
    ToggleListButton.addEventListener('click', function() {
        const aisde = GetElement('#Aside');
        const style = window.getComputedStyle(aisde);

        if (parseInt(style.width) > 1) {
            aisde.style.width = '0px'
            aisde.style.minWidth = '0px'
            console.log(style.width)
        } else {
            aisde.style.width = '200px'
            aisde.style.minWidth = '200px'
            console.log(style.width)
        }
    })

    let state = false;
    const profileToggleButton = document.querySelector('.profile')
    profileToggleButton.addEventListener('click', function()
    {
        const listContainer = document.querySelector('.profileList')
        if(!state) {
            listContainer.style.display = 'flex'
            state = true
        } else {
            listContainer.style.display = 'none'
            state = false
        }
    })
</script>