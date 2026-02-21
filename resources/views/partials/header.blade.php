<div class="topbar__mobile-toggle" id="mobileToggle">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
</div>

<div class="topbar__search">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>
    <input type="text" placeholder="Cari..." aria-label="Search">
</div>

<div class="topbar__actions">
    <button class="topbar__notification" aria-label="Notifications">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        <span class="topbar__badge">2</span>
    </button>
    <div class="topbar__profile" id="profileToggle">
        <img src="https://ui-avatars.com/api/?name=Andi+Admin&background=EBF4FF&color=2B78E4" alt="Admin"
            class="profile__avatar">
        <div class="profile__info">
            <span class="profile__name"> <span class="profile__role">•
                    Admin</span></span>
        </div>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748B" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>

        <div class="profile__dropdown" id="profileDropdown">
            <div class="dropdown__header">
                <p class="dropdown__name"></p>
                <p class="dropdown__email"></p>
            </div>
            <hr class="dropdown__divider">
            <a href="#" class="dropdown__item">
                <i class="fa-regular fa-user"></i> Profil Saya
            </a>
            <a href="#" class="dropdown__item">
                <i class="fa-solid fa-gear"></i> Pengaturan
            </a>
            <hr class="dropdown__divider">

            <form method="POST" action="">
                @csrf
                <button type="submit" class="dropdown__item text-danger">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</div>
