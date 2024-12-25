<div class="common-card flex flex-col gap-[10px]"
    style="border-left: 8px solid <?= $status === 'closed' ? '#C02930' : '#A3D131' ?>;">
    <div class="flex">
        <div class="flex-grow text-black font-[700] text-[24px]">
            <?= htmlspecialchars($title) ?>
        </div>
        <div><img src="{{ $icon }}" /></div>
    </div>
    <div class="text-[16px]"><?= htmlspecialchars($description) ?></div>
    <div class="flex items-center gap-[8px] flex-grow">
        <div>Status:</div>
        <div class="<?= $status === 'closed' ? 'pill-danger' : 'pill-success' ?>">
            <?= htmlspecialchars($status) ?>
        </div>
    </div>
    <div class="flex font-[700] gap-[5px] items-center">
        <img src="/images/icons/stopwatch.svg" />
        <div style="color: <?= $status === 'closed' ? '#561216' : '#394911' ?>">
            <?= htmlspecialchars($date) ?></div>
    </div>
</div>
