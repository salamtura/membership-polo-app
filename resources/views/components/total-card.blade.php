<div class="common-card flex flex-col gap-[30px]">
    <div class="flex flex-grow">
        <div class="flex-grow font-[500] text-[16px]">
            <?php echo htmlspecialchars($name); ?>
        </div>
        <img src="{{ $icon }}" />
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
