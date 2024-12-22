<div class="common-card gap-[60px]">
    <div class="flex">
        <div class="flex-grow font-[500] text-[16px]">
            <?php echo htmlspecialchars($title); ?>
        </div>
        <div>
            <?php echo $icon; ?>
        </div>
    </div>
    <div class="flex items-center gap-[15px]">
        <div class="text-[30px] font-[500]">
            <?php echo number_format($value); ?>
        </div>
        <div class="pill-grey">
            <?php echo htmlspecialchars($status); ?>
        </div>
    </div>
</div>
