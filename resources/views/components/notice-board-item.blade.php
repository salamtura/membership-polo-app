<div class="flex items-center flex-wrap">
    <div class="w-[100px] {{-- flex --}} items-start mr-[20px] hidden">
        <div class="w-[70px] flex-grow bg-[#A3D131] text-white text-[14px] p-[5px]">
            {{ $datelabel }}</div>
        <div class="w-[30px] bg-[#E2F1BF] text-[14px] font-[500] text-center text-[#293130] p-[5px]">
            {{ $day }}</div>
    </div>
    <div class="{{-- w-[450px] --}} flex flex-col gap-[8px] pl-[20px] {{-- py-2 --}}"
        style="border-left: 6px solid #A3D131">
        <div class="text-[#293130] text-[16px] font-[700]"><a
                href="/post-details/{{ $noticeID }}">{{ $title }}</a></div>
        <div class="text-[#374140] font-[400] text-[14px]"><?php echo htmlspecialchars($description); ?></div>
        <div class="flex flex-col gap-2">
            <div class="{{-- flex --}} hidden items-center flex-wrap gap-[10px]">
                <div class="font-[400] text-[14px] text-[#667185]">{{ $players }} Players</div>
                <div class="pill-success p-0 text-[13px] px-2">{{ $breakoutSessions }} Breakout Sessions</div>
            </div>
            <div class="flex items-center gap-[4px]">
                <img src="images/icons/clock.svg" />
                <div class="text-[#667185] text-[14px] font-[400]">{{ $time }}</div>
            </div>
        </div>
    </div>
</div>
