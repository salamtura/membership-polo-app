<div class="common-card flex flex-col"
    style="gap: 10px; border-left: 8px solid <?= $status === 'closed' ? '#C02930' : '#A3D131' ?>;">
    <div style="display: flex">
        <div style="flex-grow: 1; color: #000000; font-weight: 700; font-size: 24px">
            <?= htmlspecialchars($title) ?></div>
        <div>
            <?= $icon ?>


        </div>
    </div>
    <div class="text-[16px]"><?= htmlspecialchars($description) ?></div>
    <div class="flex items-center gap-[8px] flex-grow">
        <div>Status:</div>
        <div class="<?= $status === 'closed' ? 'pill-danger' : 'pill-success' ?>">
            <?= htmlspecialchars($status) ?>
        </div>
    </div>
    <div
        style="display: <?= $date === '' ? 'none' : 'flex' ?>; color: #394911; font-weight: 700; align-items: center; gap: 5px">
        <div>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9 3V1H15V3H9ZM11 14H13V8H11V14ZM12 22C10.7667 22 9.604 21.7627 8.512 21.288C7.42 20.8133 6.466 20.1673 5.65 19.35C4.834 18.5327 4.18833 17.5783 3.713 16.487C3.23767 15.3957 3 14.2333 3 13C3 11.7667 3.23767 10.604 3.713 9.512C4.18833 8.42 4.834 7.466 5.65 6.65C6.466 5.834 7.42033 5.18833 8.513 4.713C9.60567 4.23767 10.768 4 12 4C13.0333 4 14.025 4.16667 14.975 4.5C15.925 4.83333 16.8167 5.31667 17.65 5.95L19.05 4.55L20.45 5.95L19.05 7.35C19.6833 8.18333 20.1667 9.075 20.5 10.025C20.8333 10.975 21 11.9667 21 13C21 14.2333 20.7623 15.396 20.287 16.488C19.8117 17.58 19.166 18.534 18.35 19.35C17.534 20.166 16.5797 20.812 15.487 21.288C14.3943 21.764 13.232 22.0013 12 22ZM12 20C13.9333 20 15.5833 19.3167 16.95 17.95C18.3167 16.5833 19 14.9333 19 13C19 11.0667 18.3167 9.41667 16.95 8.05C15.5833 6.68333 13.9333 6 12 6C10.0667 6 8.41667 6.68333 7.05 8.05C5.68333 9.41667 5 11.0667 5 13C5 14.9333 5.68333 16.5833 7.05 17.95C8.41667 19.3167 10.0667 20 12 20Z"
                    fill="#374140" />
            </svg>

        </div>
        <div style="color: <?= $status === 'closed' ? '#561216' : '#394911' ?>">
            <?= htmlspecialchars($date) ?></div>
    </div>
</div>
