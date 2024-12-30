<div class="common-card flex flex-col gap-[30px]">
    <div class="flex flex-grow">
        <div class="flex-grow font-[500] text-[12px]  sm:text-[16px]">
            <?php echo htmlspecialchars($name); ?>
        </div>
        <img class="w-[24px] h-[24px] sm:w-auto sm:h-auto" src="{{ $icon }}" />
    </div>
    <div class="flex sm:items-center flex-col sm:flex-row gap-[15px]">
        <div class="text-[30px] font-[500]">
            <?php echo number_format($value); ?>
        </div>
        <div class="pill-grey text-[10px] sm:text-[16px] self-start sm:self-auto">
            <?php echo htmlspecialchars($status); ?>
        </div>
    </div>
</div>
