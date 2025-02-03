<aside id="Aside">
    <?php $page_name = $_SERVER['REQUEST_URI']; ?>
    <div>
        <!-- logo -->
        <div class="logo">
            <img src="/image/logo_caisse.svg" alt="">
        </div>
        <nav class="top_nav">
            <?php if($_SESSION['user_access'] == 'admin'): ?>
                <a href="/dashboard" class="<?php echo $page_name == "/dashboard" ? "active_link" : ""; ?>">
                    <i class="fa-duotone fa-grid-2"></i>
                    <span>Dashboard</span>
                </a>
            <?php endif; ?>

            <a href="/recettes" class="<?php echo $page_name == "/recettes" ? "active_link" : ""; ?>">
                <i class="fa-duotone fa-money-bill-trend-up"></i>
                <span>Recettes</span>
            </a>

            <a href="/chargesvariables" class="<?php echo $page_name == "/chargesvariables" ? "active_link" : ""; ?>">
                <i class="fa-duotone fa-money-bill-trend-up"></i>
                <span>Charges Variables</span>
            </a>
    
            <a href="/chargesfixes" class="<?php echo $page_name == "/chargesfixes" ? "active_link" : ""; ?>">
                <i class="fa-duotone fa-money-bill-trend-up"></i>
                <span>Charges Fixe</span>
            </a>
    
        </nav>
    </div>
    <nav class="bottom_nav">
        <button id="logout" class="logout_button">
            <i class="fa-duotone fa-arrow-right-from-bracket"></i>
            <span>Déconnexion</span>
        </button>
    </nav>
</aside>